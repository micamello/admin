<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use DB;
//use Session;

class Usuario extends Model
{
	//public $timestamps = false;



  	// protected $table = 'p_usuario';

  	// protected $primaryKey = 'id_usuario';


  	// public static function filtrado($filtrado_opcion){
   //      switch ($filtrado_opcion) {
   //        case 'E_G':
   //        \Log::info($filtrado_opcion);
   //            $filtrado = DB::table('p_usuario')
   //                            ->select('data.id_usuario', 'data.*', DB::raw('sum(case when pre.cuestionario = 1 then res.valor else 0 end) as uno,sum(case when pre.cuestionario = 2 then res.valor else 0 end) as dos, sum(case when pre.cuestionario = 3 then res.valor else 0 end) as tres'))
   //                            ->distinct()
   //                            ->from(DB::raw("(select *, timestampdiff(year, fecha_nacimiento, curdate()) as edad from p_usuario) as data"))
   //                            ->rightjoin('p_respuesta as res', 'data.id_usuario', '=', 'res.id_usuario')
   //                            ->rightjoin('p_pregunta as pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
   //                            ->where('edad', '=', session::get('edad'))
   //                            ->where('genero', '=', session::get('genero'))
   //                            ->groupBy('data.id_usuario')
   //                            ->get(); 
   //        break;
   //        case 'E':
   //        \Log::info($filtrado_opcion);
   //            $filtrado = DB::table('p_usuario')
   //                            ->select('data.id_usuario', 'data.*', DB::raw('sum(case when pre.cuestionario = 1 then res.valor else 0 end) as uno,sum(case when pre.cuestionario = 2 then res.valor else 0 end) as dos, sum(case when pre.cuestionario = 3 then res.valor else 0 end) as tres'))
   //                            ->distinct()
   //                            ->from(DB::raw("(select *, timestampdiff(year, fecha_nacimiento, curdate()) as edad from p_usuario) as data"))
   //                            ->rightjoin('p_respuesta as res', 'data.id_usuario', '=', 'res.id_usuario')
   //                            ->rightjoin('p_pregunta as pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
   //                            ->where('edad', '=', session::get('edad'))
   //                            ->groupBy('data.id_usuario')
   //                            ->get();
   //        break;
   //        case 'G':
   //        \Log::info($filtrado_opcion);
   //            $filtrado = DB::table('p_usuario')
   //                            ->select('data.id_usuario', 'data.*', DB::raw('sum(case when pre.cuestionario = 1 then res.valor else 0 end) as uno,sum(case when pre.cuestionario = 2 then res.valor else 0 end) as dos, sum(case when pre.cuestionario = 3 then res.valor else 0 end) as tres'))
   //                            ->distinct()
   //                            ->from(DB::raw("(select *, timestampdiff(year, fecha_nacimiento, curdate()) as edad from p_usuario) as data"))
   //                            ->rightjoin('p_respuesta as res', 'data.id_usuario', '=', 'res.id_usuario')
   //                            ->rightjoin('p_pregunta as pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
   //                            ->where('genero', '=', session::get('genero'))
   //                            ->groupBy('data.id_usuario')
   //                            ->get();
   //        break;
   //        default:
   //            $filtrado = DB::table('p_usuario')
   //                            ->select('data.id_usuario', 'data.*', DB::raw('sum(case when pre.cuestionario = 1 then res.valor else 0 end) as uno,sum(case when pre.cuestionario = 2 then res.valor else 0 end) as dos, sum(case when pre.cuestionario = 3 then res.valor else 0 end) as tres'))
   //                            ->distinct()
   //                            ->from(DB::raw("(select *, timestampdiff(year, fecha_nacimiento, curdate()) as edad from p_usuario) as data"))
   //                            ->rightjoin('p_respuesta as res', 'data.id_usuario', '=', 'res.id_usuario')
   //                            ->rightjoin('p_pregunta as pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
   //                            ->groupBy('data.id_usuario')
   //                            ->get();
   //          break;
   //      }
   //  	return $filtrado;
  	// }

   //  public static function datosEncuesta($id){
   //    $preguntas = DB::table('p_pregunta as pre')
   //                    ->join('p_respuesta as res', 'pre.id_pregunta', '=', 'res.id_pregunta')
   //                    ->join('p_usuario as u', 'res.id_usuario', '=', 'u.id_usuario')
   //                    ->where('u.id_usuario', '=', $id)
   //                    ->get();

   //    return $preguntas;
   //  }
}