<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Http\Requests\PokemonRequest;
use App\Models\Tipo;
use App\Models\Ataque;
use App\Models\PokeTipo;
use Illuminate\Support\Facades\Cache;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = DB::table('pokemon')
        ->join('poke_tipo', function ($join) {
            $join->on('pokemon.id', '=', 'poke_tipo.idPokemon');
        })
	    ->join('tipo', function ($join) {
            $join->on('tipo.id', '=', 'poke_tipo.idTipo');
        })
	    ->join('poke_ataque', function ($join) {
            $join->on('pokemon.id', '=', 'poke_ataque.idPokemon');
        })
	    ->join('ataque', function ($join) {
            $join->on('ataque.id', '=', 'poke_ataque.idAtaque');
        })
        ->select('pokemon.*', 'ataque.nombre as ataque' , 'tipo.nombre as tipo')
        ->get();
        
        return response()->json(['status'=>'ok','data'=>$pokemon], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonRequest $request)
	{

        $pokemon = $request->createPokemon();
        return response()->json(['data'=>$pokemon] , 201)->header('Location',  url('/api/v1/').'/pokemon/'.$pokemon->id);


        // if (!$request->nombre || !$request->descripcion || !$request->peso || !$request->altura || !$request->generacion || !$request->imagen)
		// {   
		// 	return response()->json(['errors'=>array(['code'=>422,'message'=>'Data is missing to access your request.'])],422);
        // }

        // $pokemon = Pokemon::create([
        //     'nombre'=> $request->nombre,
        //     'descripcion'=> $request->descripcion,
        //     'peso'=> $request->peso,
        //     'altura'=> $request->altura,
        //     'generacion'=> $request->generacion,
        //     'imagen'=> $request->imagen
        // ]);
        // $pokemon->pokeataque()->create([
        //     'idAtaque'=> $request->idAtaque
        // ]);

      
        // $pokemon->poketipo()->create(['idTipo'=> $request->idTipo]);








        // $newPokemon=Pokemon::create($request->all());

        // $listaPokemons=Pokemon::all();

        
        // $lastPokemon = $listaPokemons->last();

        // $listaTipos=Tipo::all();

        // //$newTipo = $lastPokemon->poketipo->create($request->idTipo);  

        // echo(json_encode($listaTipos));

        // $tipoEncontrado=$listaTipos::find($request->idTipo);
        //  echo($tipoEncontrado);

       // $newTipo = $pokemon->poketipo->create($request->idTipo);   
        
        // $newTipo_pokeTipo = Poke_tipo::create([
        //     'idPokemon' => $lastPokemon->id,
        //     'idTipo' => $idTipo->id,
        // ]);

    
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
