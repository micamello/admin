<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mfo_plan extends Model
{
	protected $table = 'mfo_plan';
    protected $primaryKey = 'id_plan';

    // public function planes(){
    // 	return $this->hasMany('App\mfo_empresa_plan', 'id_plan', 'id_plan');
    // }
}