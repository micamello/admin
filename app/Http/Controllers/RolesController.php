<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rol;

class RolesController extends Controller
{
	
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $roles = Rol::orderBy('id_rol','ASC')->paginate(10);
    return view('roles.index')->with('roles',$roles);
  }

  public function create(){
    return view('roles.create');
  }

  public function store(Request $request){  
    $validator = Validator::make($request->all(), [
      'descripcion' => ['required','min:5','max:100','regex:/^[a-z0-9 ]+$/i','unique:mfo_rol']      
    ]);      
    if ($validator->fails()) {      	
      return redirect()->route('roles.create')
                       ->withErrors($validator,'rol');
    }
    try {        
        $rol = new Rol;
        $rol->descripcion = trim($request->descripcion);        
        $rol->save();                  
    }       
    catch (\Exception $e) {
        return redirect()->route('roles.create')
                         ->withErrors($e->getMessage(),'rol');
    } 
    return redirect()->route('roles.index');
  }
  
  public function show($id){    	    	      
    $rol = Rol::find($id);                                 
    return view('roles.show')->with('rol',$rol);
  }

  public function edit($id){      
    $rol = Rol::find($id);             
    return view('roles.edit')->with('rol',$rol);      
  }

  public function update(Request $request, $id){
    $rol = Rol::find($id);     
    $validator = Validator::make($request->all(), [
      'descripcion' => ['required','min:5','max:100','regex:/^[a-z0-9 ]+$/i',Rule::unique('mfo_rol')->ignore($id,'id_rol')]
    ]);
    if ($validator->fails()) {        
      return redirect()->route('roles.edit',$id)
                       ->with('rol',$rol)                       
                       ->withErrors($validator,'rol');
    }
    try {  
      $rol->descripcion = trim($request->descripcion);      	
      $rol->save();
    }       
    catch (\Exception $e) {
      return redirect()->route('roles.edit',$id)
                       ->with('rol',$rol)                       
                       ->withErrors($validator,'rol');
    } 
    return redirect()->route('roles.index');
  }

  public function destroy($id){
    $rol = Rol::find($id);        
    try {  
      $administrador = Administrador::existeRol($id);
      if (!empty($administrador)){
        throw new \Exception('El registro tiene asociado administradores, no es posible eliminarlo');
      }        
      $rol->delete();
    }       
    catch (\Exception $e) {
      return redirect()->route('roles.index')
                       ->withErrors($e->getMessage(),'rol');
    }        
    return redirect()->route('roles.index');
  }

  public function search(Request $request){     
    $roles = Rol::search($request->busqueda);
    return view('roles.index')->with('roles',$roles);
  }

}
