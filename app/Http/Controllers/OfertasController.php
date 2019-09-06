<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//base de datos
use App;

class OfertasController extends Controller
{
       public function listar(){
            $lista = App\mfo_empresa::all();
			return view('ofertas.ofertas',compact('lista'));
            // return response()->json(['lista'=>$lista]);
       }

       public function findOfertas($id){
            $ofertaEmpresa = DB::table('mfo_oferta')
                              ->select(DB::raw('count(mfo_postulacion.id_auto) as numeroPos, mfo_oferta.id_ofertas, mfo_ciudad.nombre, mfo_oferta.titulo, mfo_plan.nombre as plan, (CASE WHEN mfo_oferta.estado = 1 THEN "APROBADA"
                                         WHEN mfo_oferta.estado = 0 THEN "RECHAZADA"
                                         WHEN mfo_oferta.estado = 2 THEN "POR APROBAR" END) as estatus, DATE_FORMAT(mfo_oferta.fecha_creado, "%d-%m-%Y") as fecha_creado, DATE_FORMAT(mfo_oferta.fecha_caducidad, "%d-%m-%Y") as fecha_caducidad'))
                                 ->join('mfo_empresa', 'mfo_oferta.id_empresa','=','mfo_empresa.id_empresa')
                                 ->join('mfo_empresa_plan', 'mfo_oferta.id_empresa_plan','=','mfo_empresa_plan.id_empresa_plan')
                                 ->join('mfo_plan', 'mfo_plan.id_plan','=','mfo_empresa_plan.id_plan')
                                 ->join('mfo_postulacion', 'mfo_postulacion.id_ofertas','=','mfo_oferta.id_ofertas')
                                 ->join('mfo_ciudad', 'mfo_oferta.id_ciudad','=','mfo_ciudad.id_ciudad')
                                 ->where('mfo_empresa.id_empresa',$id)
                                 ->groupBy('mfo_oferta.id_ofertas')
                                 ->get();
                                 // ->select('mfo_oferta.titulo', 'mfo_oferta.fecha_creado', 'count(mfo_postulacion.id_auto) as numero')
            return response()->json(['ofertaEmpresa'=>$ofertaEmpresa]);
       }

       public function buscarOfertaAjax($id){
            $ofertaFound = DB::table('mfo_oferta')
                           ->select(DB::raw('count(mfo_postulacion.id_auto) as numeroPos, mfo_oferta.id_ofertas,  mfo_ciudad.nombre as ciudad, mfo_contactoempresa.nombres as contacto_nombre, mfo_contactoempresa.apellidos as contacto_apellido, mfo_contactoempresa.telefono1, mfo_oferta.descripcion, mfo_oferta.titulo, mfo_plan.nombre as plan, mfo_empresa.nombres as empresa, mfo_oferta.id_ofertas, IF(mfo_empresa_plan.estado > 0, "ACTIVO", "INACTIVO") as estatus_plan, DATE_FORMAT(mfo_empresa_plan.fecha_compra, "%d-%m-%Y") as fecha_compra_plan, DATE_FORMAT(mfo_empresa_plan.fecha_caducidad, "%d-%m-%Y") as fecha_caducidad_plan, (CASE WHEN mfo_oferta.estado = 1 THEN "APROBADA"
                                         WHEN mfo_oferta.estado = 0 THEN "RECHAZADA"
                                         WHEN mfo_oferta.estado = 2 THEN "POR APROBAR" END) as estatus, DATE_FORMAT(mfo_oferta.fecha_creado, "%d-%m-%Y") as fecha_creado, DATE_FORMAT(mfo_oferta.fecha_caducidad, "%d-%m-%Y") as fecha_caducidad'))

                                 ->join('mfo_empresa', 'mfo_oferta.id_empresa','=','mfo_empresa.id_empresa')
                                 ->join('mfo_empresa_plan', 'mfo_oferta.id_empresa_plan','=','mfo_empresa_plan.id_empresa_plan')
                                 ->join('mfo_plan', 'mfo_plan.id_plan','=','mfo_empresa_plan.id_plan')
                                 ->join('mfo_postulacion', 'mfo_postulacion.id_ofertas','=','mfo_oferta.id_ofertas')
                                 ->join('mfo_contactoempresa', 'mfo_contactoempresa.id_empresa','=','mfo_empresa.id_empresa')
                                 ->join('mfo_ciudad', 'mfo_oferta.id_ciudad','=','mfo_ciudad.id_ciudad')
                                 ->where('mfo_oferta.id_ofertas',$id)
                                 ->groupBy('mfo_oferta.id_ofertas')
                                 ->get();

            return response()->json(['ofertaFound'=>$ofertaFound]);
       }    

}?>