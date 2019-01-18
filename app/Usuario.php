<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Usuario extends Model
{
	public $timestamps = false;

  	protected $table = 'p_usuario';

  	protected $primaryKey = 'id_usuario';


  	public static function filtrado($filtrado_opcion){
        switch ($filtrado_opcion) {
          case 'E_G':
          \Log::info($filtrado_opcion);
              $filtrado = DB::table('p_usuario')
                              ->select('data.id_usuario', 'data.*', DB::raw('SUM(CASE WHEN pre.cuestionario = 1 THEN res.valor ELSE 0 END) AS uno, SUM(CASE WHEN pre.cuestionario = 2 THEN res.valor ELSE 0 END) AS dos, SUM(CASE WHEN pre.cuestionario = 3 THEN res.valor ELSE 0 END) AS tres'))
                              ->distinct()
                              ->from(DB::raw("(SELECT *, TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) AS edad FROM p_usuario) AS data"))
                              ->rightjoin('p_respuesta AS res', 'data.id_usuario', '=', 'res.id_usuario')
                              ->rightjoin('p_pregunta AS pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
                              ->where('edad', '=', session::get('edad'))
                              ->where('genero', '=', session::get('genero'))
                              ->groupBy('data.id_usuario')
                              ->get(); 
          break;
          case 'E':
          \Log::info($filtrado_opcion);
              $filtrado = DB::table('p_usuario')
                              ->select('data.id_usuario', 'data.*', DB::raw('SUM(CASE WHEN pre.cuestionario = 1 THEN res.valor ELSE 0 END) AS uno, SUM(CASE WHEN pre.cuestionario = 2 THEN res.valor ELSE 0 END) AS dos, SUM(CASE WHEN pre.cuestionario = 3 THEN res.valor ELSE 0 END) AS tres'))
                              ->distinct()
                              ->from(DB::raw("(SELECT *, TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) AS edad FROM p_usuario) AS data"))
                              ->rightjoin('p_respuesta AS res', 'data.id_usuario', '=', 'res.id_usuario')
                              ->rightjoin('p_pregunta AS pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
                              ->where('edad', '=', session::get('edad'))
                              ->groupBy('data.id_usuario')
                              ->get();
          break;
          case 'G':
          \Log::info($filtrado_opcion);
              $filtrado = DB::table('p_usuario')
                              ->select('data.id_usuario', 'data.*', DB::raw('SUM(CASE WHEN pre.cuestionario = 1 THEN res.valor ELSE 0 END) AS uno, SUM(CASE WHEN pre.cuestionario = 2 THEN res.valor ELSE 0 END) AS dos, SUM(CASE WHEN pre.cuestionario = 3 THEN res.valor ELSE 0 END) AS tres'))
                              ->distinct()
                              ->from(DB::raw("(SELECT *, TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) AS edad FROM p_usuario) AS data"))
                              ->rightjoin('p_respuesta AS res', 'data.id_usuario', '=', 'res.id_usuario')
                              ->rightjoin('p_pregunta AS pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
                              ->where('genero', '=', session::get('genero'))
                              ->groupBy('data.id_usuario')
                              ->get();
          break;
          default:
              $filtrado = DB::table('p_usuario')
                              ->select('data.id_usuario', 'data.*', DB::raw('SUM(CASE WHEN pre.cuestionario = 1 THEN res.valor ELSE 0 END) AS uno, SUM(CASE WHEN pre.cuestionario = 2 THEN res.valor ELSE 0 END) AS dos, SUM(CASE WHEN pre.cuestionario = 3 THEN res.valor ELSE 0 END) AS tres'))
                              ->distinct()
                              ->from(DB::raw("(SELECT *, TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) AS edad FROM p_usuario) AS data"))
                              ->rightjoin('p_respuesta AS res', 'data.id_usuario', '=', 'res.id_usuario')
                              ->rightjoin('p_pregunta AS pre', 'res.id_pregunta', '=', 'pre.id_pregunta')
                              ->groupBy('data.id_usuario')
                              ->get();
            break;
        }
    	return $filtrado;
  	}

    public static function datosEncuesta($id){
      $preguntas = DB::table('p_pregunta AS pre')
                      ->join('p_respuesta AS res', 'pre.id_pregunta', '=', 'res.id_pregunta')
                      ->join('p_usuario AS u', 'res.id_usuario', '=', 'u.id_usuario')
                      ->where('u.id_usuario', '=', $id)
                      ->get();

      return $preguntas;
    }
}