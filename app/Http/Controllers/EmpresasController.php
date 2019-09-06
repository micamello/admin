<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//base de datos
use App;

class EmpresasController extends Controller
{
	    public function listar(){

            $lista = DB::table('mfo_empresa')
                     ->join('mfo_usuario_login', 'mfo_empresa.id_usuario_login','=','mfo_usuario_login.id_usuario_login')
                     ->join('mfo_sectorindustrial', 'mfo_empresa.id_sectorindustrial','=','mfo_sectorindustrial.id_sectorindustrial')
                     ->leftJoin('mfo_ciudad', 'mfo_ciudad.id_ciudad','=','mfo_empresa.id_ciudad')
                     ->select('mfo_empresa.*', 'mfo_usuario_login.username', 'mfo_usuario_login.correo', 'mfo_ciudad.nombre', 'mfo_sectorindustrial.descripcion')
                     ->paginate(30);

            \DB::connection()->enableQueryLog();
            $queries = \DB::getQueryLog();
            \Log::info($queries);
			return view('empresas.empresas',compact('lista'));
    }

}
