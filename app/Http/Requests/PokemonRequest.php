<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Pokemon;

class PokemonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        switch($this->getMethod()){
            case 'POST':
                $rules = [
                    'nombre' => 'required',
                    'descripcion' => 'required',
                    'peso' => 'required',
                    'altura' => 'required',
                    'generacion' => 'required',
                    'imagen' => 'required',
                    'idTipo' => 'required'
                ];
                break;
            // case 'PUT':
            //     $codigo = $this->route('trabajador');
            //     $rules = [
            //         'nombres' => 'required',
            //         'apellidoPaterno' => 'required',
            //         'apellidoMaterno' => 'required',
            //         'tipoDocumento' => 'required|in:DN,CE,PA',
            //         'numeroDocumento' => 'required|unique:trabajador,numeroDocumento,'. $codigo .',codigo',
            //         'celularPersonal' => 'required',
            //         'correoPersonal' => 'required',
            //         'direccion' => 'required',
            //         'codigoLocal' => 'required',
            //         'vigente' => 'required',
            //     ];
            //     break;
        }
        
        return $rules;
    }

    public function createPokemon(){
        return DB::transaction(function() {        
            $data = $this->validated();
            echo $data['nombre'];
            $pokemon = Pokemon::create([
                'nombre'=> $data['nombre'],
                'descripcion'=> $data['descripcion'],
                'peso'=> $data['peso'],
                'altura'=> $data['altura'],
                'generacion'=> $data['generacion'],
                'imagen'=> $data['imagen']
            ]); 
            
            $pokemon->poketipo()->create([
                'idTipo' => $data['idTipo']
            ]);

            return $pokemon;             
        });  
    }
}
