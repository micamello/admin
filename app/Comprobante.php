<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comprobante extends Model
{
    public $timestamps = false;

    protected $table = 'mfo_rcomprobantescam';
    
    protected $primaryKey = 'id_comprobante';

    public static function existeAdministrador($idadmin){    	
      $comprobante = Comprobante::where('id_admin',$idadmin)
                                ->select('id_comprobante')
                                ->first();
      return $comprobante;                                      
    }
}
