<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  public $timestamps = false;

  protected $table = 'mfo_rol';
    
  protected $primaryKey = 'id_rol';

  public static function search($texto){
    $roles = Rol::where('descripcion','LIKE','%'.$texto.'%')                                            
                ->orderBy('id_rol','ASC')
                ->paginate(10);
    return $roles;            
  }

}
