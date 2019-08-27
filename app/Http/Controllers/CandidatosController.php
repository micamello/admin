<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;

//base de datos
use App;

class CandidatosController extends Controller
{
	    public function listar(){
            // $lista = App\mfo_usuario::all();
            // $lista = App\mfo_usuario()->join('mfo_usuario_login', '', '')::paginate(30);
            /*Ahorita esta trayendo solo los que tienen HV....*/
            // $lista = DB::table('mfo_usuario')->
            //              join('mfo_usuario_login', 'mfo_usuario.id_usuario_login','=','mfo_usuario_login.id_usuario_login')->
            //              join('mfo_infohv', 'mfo_usuario.id_usuario','=','mfo_infohv.id_usuario')->
            //              select('mfo_usuario.*', 'mfo_usuario_login.username', 'mfo_usuario_login.correo', 'mfo_infohv.formato')
            // 	->paginate(30);
            $lista = DB::table('mfo_usuario')
                     ->join('mfo_usuario_login', 'mfo_usuario.id_usuario_login','=','mfo_usuario_login.id_usuario_login')
                     ->leftJoin('mfo_infohv', 'mfo_infohv.id_usuario','=','mfo_usuario.id_usuario')
                     ->select('mfo_usuario.*', 'mfo_usuario_login.username', 'mfo_usuario_login.correo', 'mfo_infohv.formato')
                     ->paginate(30);
            // ->get();
            // \Log::info("aqui en query");
            // \Log::info($lista);
           	// print_r($lista);
            // exit();
            \DB::connection()->enableQueryLog();
            $queries = \DB::getQueryLog();
            \Log::info($queries);
			return view('candidatos',compact('lista'));
    }

}
