<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Administrador;
use App\Rol;
use App\Comprobante;

class AdministradoresController extends Controller
{

    public function __construct(){
      $this->middleware('auth');
    }
    
    public function create(Request $request){
    	$roles = Rol::all();
      $request->user()->authorizeRoles(['administrador']);
    	return view('administradores.create')->with('roles',$roles);
    }

    public function store(Request $request){  


      $validator = Validator::make($request->all(), [
        'username' => ['required','min:5','max:50','regex:/^[a-z0-9]+$/i','unique:mfo_admin'],        
        'password' => ['required','min:8','max:15'],
        'correo' => ['required','min:8','max:100','email','unique:mfo_admin'],
        'nombres' => ['required','min:8','max:255','regex:/^[a-z ÁÉÍÓÚáéíóúñÑ]+$/i'],
        'id_rol' => ['required','integer']          
      ]);
      
      if ($validator->fails()) {      	
        return redirect()->route('administradores.create')
                         ->withErrors($validator,'administrador');
      }
       
      try {        
        $administrador = new Administrador;
        $administrador->username = trim($request->username);
        $administrador->password = bcrypt($request->password);
        $administrador->correo = $request->correo;
        $administrador->nombres = $request->nombres;
        $administrador->estado = $request->estado;
        $administrador->ultima_sesion = date('Y-m-d H:i:s');
        $administrador->id_rol = $request->id_rol;        
        $administrador->save();                  
      }       
      catch (\Exception $e) {
        return redirect()->route('administradores.create')
                         ->withErrors($e->getMessage(),'administrador');
      } 

      return redirect()->route('administradores.index');
    }

    public function index(){

       $request->user()->authorizeRoles(['psicologo','administrador']);
    	$administradores = Administrador::orderBy('id_admin','ASC')->paginate(10);
    	return view('administradores.index')->with('administradores',$administradores);
    }

    public function show($id){    	    	      
      $administrador = Administrador::busquedaIndividual($id);                                 
    	return view('administradores.show')->with('administrador',$administrador);
    }

    public function destroy($id){
    	$administrador = Administrador::find($id);    
      if ($administrador->username == 'admin'){
        return redirect()->route('administradores.index');
      }	
      try {  
        $comprobante = Comprobante::existeAdministrador($id);
        if (!empty($comprobante)){
          throw new \Exception('El registro tiene asociado comprobantes, no es posible eliminarlo');
        }        
        $administrador->delete();
      }       
      catch (\Exception $e) {
        return redirect()->route('administradores.index')
                         ->withErrors($e->getMessage(),'administrador');
      }        
      return redirect()->route('administradores.index');
    }

    public function edit($id){      
      $administrador = Administrador::find($id);
      if ($administrador->username == 'admin'){
        return redirect()->route('administradores.index');
      }      
      $roles = Rol::all();
      return view('administradores.edit')->with('administrador',$administrador)
                                         ->with('roles',$roles);      
    }

    public function update(Request $request, $id){
    	$administrador = Administrador::find($id);
      $roles = Rol::all();
      $validator = Validator::make($request->all(), [
        'username' => ['required','min:5','max:50','regex:/^[a-z0-9]+$/i',Rule::unique('mfo_admin')->ignore($id,'id_admin')],
        'password' => ['nullable','min:8','max:15'],
        'correo' => ['required','min:8','max:100','email',Rule::unique('mfo_admin')->ignore($id,'id_admin')],   
        'nombres' => ['required','min:8','max:255','regex:/^[a-z ÁÉÍÓÚáéíóúñÑ]+$/i'],
        'id_rol' => ['required','integer']          
      ]);
      
      if ($validator->fails()) {        
        return redirect()->route('administradores.edit',$id)
                         ->with('administrador',$administrador)
                         ->with('roles',$roles)
                         ->withErrors($validator,'administrador');
      }

      try {  
      	$administrador->username = trim($request->username);
      	if (!empty($request->password)){
          $administrador->password = bcrypt($request->password);
        }
        $administrador->correo = $request->correo;
        $administrador->nombres = $request->nombres;
        $administrador->estado = $request->estado;      
        $administrador->id_rol = $request->id_rol;
        $administrador->save();
      }       
      catch (\Exception $e) {
        return redirect()->route('administradores.edit',$id)
                         ->with('administrador',$administrador)
                         ->with('roles',$roles)
                         ->withErrors($validator,'administrador');
      } 
      return redirect()->route('administradores.index');
    }

    public function search(Request $request){     
      $administradores = Administrador::busqueda($request->busqueda);
      return view('administradores.index')->with('administradores',$administradores);
    }
}
