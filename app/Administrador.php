<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Administrador extends Model
{
	  
	public $timestamps = false;

  protected $table = 'mfo_admin';
    
  protected $primaryKey = 'id_admin';

  public static function busquedaIndividual($id){
    $administrador = Administrador::join('mfo_rol', 'mfo_admin.id_rol', '=', 'mfo_rol.id_rol')
                                  ->where('mfo_admin.id_admin', $id)
                                  ->select('mfo_admin.*', 'mfo_rol.descripcion as desrol')
                                  ->first();
    return $administrador;                                 
  }

  public static function busqueda($texto){
    $administradores = Administrador::where('username','LIKE','%'.$texto.'%')
                                    ->orWhere('correo','LIKE','%'.$texto.'%')
                                    ->orWhere('nombres','LIKE','%'.$texto.'%')
                                    ->orderBy('id_admin','ASC')
                                    ->paginate(10);
    return $administradores;                                  
  }

  public static function existeRol($idrol){
    $administrador = Administrador::where('id_rol',$idrol)
                                  ->first();
    return $administrador;
  }

}
