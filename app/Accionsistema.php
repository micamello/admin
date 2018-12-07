<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accionsistema extends Model
{
  
  public $timestamps = false;

  protected $table = 'mfo_accionsist';
    
  protected $primaryKey = 'id_accionSist';

  const CANDIDATO = 2;
  const EMPRESA = 3;
  const ADMIN = 1;

  public static function busqueda($texto){
  	$acciones = Accionsistema::where('accion','LIKE','%'.$texto.'%') 
                             ->orWhere('descripcion','LIKE','%'.$texto.'%')                                            
                             ->orderBy('id_accionSist','ASC')
                             ->paginate(10);
    return $acciones;                         
  }
}
