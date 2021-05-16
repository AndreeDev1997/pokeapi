<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeTipo extends Model
{
    use HasFactory;
    protected $table = "poke_tipo";
    protected $primaryKey = 'id';
    protected $fillable = array('idTipo');
    protected $hidden = 'idPokemon';  
    public $timestamps = false;

    public function pokemon() {
        return $this->belongsTo('App\Models\Pokemon');
    }

    public function tipo() {
        return $this->belongsTo('App\Models\Tipo');
    }
}
