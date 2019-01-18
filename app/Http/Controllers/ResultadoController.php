<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Session;

class ResultadoController extends Controller
{

    // define('GENERO', array('M'=>'Masculino', 'F'=>'Femenino'));
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $respuestas = Usuario::all();
        \Log::info($respuestas);
        return view('resultados.index', ['respuestas'=>$respuestas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $datoUsuario = Usuario::find($id);
        $preguntas = Usuario::datosEncuesta($id);

        return view('resultados.show')->with(compact('datoUsuario', 'preguntas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filterData(Request $request){
        if($request->has('edad')){
            session(['edad' => $request->edad]);
        }

        if($request->has('genero')){
            session(['genero'=>$request->genero]);
        }

        $filtrado_opcion = "";
        if($request->edad_filter_input == 1){
            \Log::info("edere");
            session::forget('edad');
        }

        if($request->genero_filter_input == 1){
            \Log::info("ederee");
            session::forget('genero');
        }

        if (session::has('genero') && session::has('edad')) {
            $filtrado_opcion = "E_G";
        }
        elseif (session::has('genero')) {
            $filtrado_opcion = "G";
        }
        elseif (session::has('edad')) {
            $filtrado_opcion = "E";
        }

        $respuestas = Usuario::filtrado($filtrado_opcion);   
        return view('resultados.index')->with('respuestas',$respuestas);
    }
}
