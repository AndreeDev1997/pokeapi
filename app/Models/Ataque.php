<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ataque extends Model
{
    use HasFactory;
    protected $table = "ataque";
    protected $$primaryKey = 'id';
    protected $fillable = array('nombre');
    public $timestamps = false;

    public function pokeataque() {
        return $this->hasMany('App\Models\PokeAtaque');
    }
}
