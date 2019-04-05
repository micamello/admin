<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PlantillaEmail;

class PlantillaEmailController extends Controller
{
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
        $listadoPlantillas = PlantillaEmail::all();
        return view('plantillas.index')->with('listadoPlantillas',$listadoPlantillas);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $required_words;
        $plantilla = PlantillaEmail::findOrFail($id);
        preg_match_all('/\°(.*?)\°/', $plantilla->contenido, $required_words);
        return view('plantillas.edit')->with(['plantilla'=>$plantilla, 'required_words'=>$required_words]);
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
        $plantilla = PlantillaEmail::findOrFail($id);
        $plantilla->nombre = $request->nombre;
        $plantilla->contenido = $request->contenido_plantilla;
        $plantilla->save();
        // return Redirect::to('plantillasEmail');
        return redirect()->route('plantillasEmail.index');
        // print_r($request->nombre);
        // exit();
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

    public function dataPlantilla($id){
        \Log::info($id);
        $plantilla = PlantillaEmail::findOrFail($id);
        return response()->json(['plantilla'=>$plantilla]);
    }

    public function existePlantilla($id, $nombre){
        $plantilla = PlantillaEmail::existePlantilla($id, $nombre);
        return response()->json(['plantilla'=>$plantilla]);
    }
}
