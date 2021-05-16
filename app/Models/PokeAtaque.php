<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeAtaque extends Model
{
    use HasFactory;
    protected $table = "pokeAtaque";
    protected $primaryKey = 'id';
    protected $fillable = array('idAtaque');
    protected $hidden = ['idPokemon'];
    public $timestamps = false;

    public function pokemon() {
        return $this->belongsTo('App\Models\Pokemon');
    }

    public function ataque() {
        return $this->belongsTo('App\Models\Ataque');
    }
}
