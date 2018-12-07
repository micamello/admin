<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accionsistema;

class AccionesController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $acciones = Accionsistema::orderBy('id_accionSist','ASC')->paginate(10);    
    return view('acciones.index')->with('acciones',$acciones);
  }

  public function search(Request $request){         
    $acciones = Accionsistema::busqueda($request->busqueda);    
    return view('acciones.index')->with('acciones',$acciones);
  }

}
