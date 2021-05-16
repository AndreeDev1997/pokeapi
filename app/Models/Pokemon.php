<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = "pokemon";    
    protected $fillable = array('nombre','descripcion','peso','altura','generacion','imagen');
    public $timestamps = false; 

    // public function pokeataque()
	// {	
	// 	return $this->hasMany('App\Models\PokeAtaque', 'idAtaque');
	// }

    public function poketipo()
	{	
		return $this->hasMany('App\Models\PokeTipo', 'idTipo');
	}

}
