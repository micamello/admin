<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mfo_oferta extends Model
{
    protected $table = 'mfo_oferta';
    protected $primaryKey = 'id_ofertas';

    public function postulacion(){
    	return $this->hasMany('App\mfo_postulacion', 'id_ofertas', 'id_ofertas');
    }
}