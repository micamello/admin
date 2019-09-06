<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//base de datos
use App;

class PlanesController extends Controller 
{
       public function listar(){
            $lista = App\mfo_empresa::all();
			return view('planes.planes',compact('lista'));
       }


       public function findPlanes($id){
                              $planEmpresa = DB::table('mfo_empresa_plan')
                                ->select(DB::raw('mfo_plan.nombre as plan, mfo_plan.id_plan, IF(mfo_empresa_plan.estado > 0, "ACTIVO", "INACTIVO") as estatus_plan, DATE_FORMAT(mfo_empresa_plan.fecha_compra, "%d-%m-%Y") as fecha_compra_plan, DATE_FORMAT(mfo_empresa_plan.fecha_caducidad, "%d-%m-%Y") as fecha_caducidad_plan, mfo_empresa_plan.num_accesos_rest, mfo_empresa.nombres as empresa'))
                                ->join('mfo_empresa', 'mfo_empresa_plan.id_empresa','=','mfo_empresa.id_empresa')
                                ->join('mfo_plan', 'mfo_empresa_plan.id_plan','=','mfo_plan.id_plan')
                                ->where('mfo_empresa.id_empresa',$id)
		                        ->get();

            return response()->json(['planEmpresa'=>$planEmpresa]);
       }



       public function buscarPlanAjax($id_plan, $id_empresa){
                              $planFound = DB::table('mfo_empresa_plan')
                                ->select(DB::raw('mfo_plan.nombre as plan, mfo_plan.id_plan, IF(mfo_empresa_plan.estado > 0, "ACTIVO", "INACTIVO") as estatus_plan, DATE_FORMAT(mfo_empresa_plan.fecha_compra, "%d-%m-%Y") as fecha_compra_plan, DATE_FORMAT(mfo_empresa_plan.fecha_caducidad, "%d-%m-%Y") as fecha_caducidad_plan, mfo_empresa_plan.num_accesos_rest, mfo_empresa.nombres as empresa, mfo_plan.costo, mfo_plan.num_post, mfo_plan.duracion, IF(mfo_plan.tipo_plan = 1, "Aviso", "Plan o Paquete") as tipo_plan, mfo_plan.num_accesos, mfo_empresa_plan.num_publicaciones_rest, IF(mfo_empresa.estado > 0, "ACTIVA", "INACTIVA") as estatus_empresa, mfo_empresa_plan.num_accesos_rest'))

                                ->join('mfo_empresa', 'mfo_empresa_plan.id_empresa','=','mfo_empresa.id_empresa')
                                ->join('mfo_plan', 'mfo_empresa_plan.id_plan','=','mfo_plan.id_plan')
                                ->where('mfo_plan.id_plan',$id_plan)
                                ->where('mfo_empresa.id_empresa',$id_empresa)
		                        ->get();

            return response()->json(['planFound'=>$planFound]);
       }



}?>