<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = "tipo";
    protected $primaryKey = 'id';
    protected $fillable = array('nombre');
    public $timestamps = false;

    public function poketipo() {
        return $this->hasMany('App\Models\PokeTipo');
    }
}