<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantillaEmail extends Model
{
    public $timestamps = false;

  	protected $table = 'mfo_templateemail';
    
  	protected $primaryKey = 'id_templateEmail';


  	public static function existePlantilla($id, $nombre){
	    $plantilla = PlantillaEmail::where('id_templateEmail', '!=', $id)
	    								->where('nombre', $nombre)
	                                  	->first();
	    return $plantilla;
	  }
}
