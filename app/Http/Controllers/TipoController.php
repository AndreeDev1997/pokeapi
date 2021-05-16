<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tipo;
use Illuminate\Support\Facades\Cache;
class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo=Cache::remember('cachetipo',15/60, function() {
            return Tipo::all();
        });
        return response()->json(['status'=>'ok','data'=>$tipo], 200);
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
    public function store(Request $request)
    {
        $nuevoTipo=Tipo::create($request->all());
        return response()->json(['data'=>$nuevoTipo], 201)->header('Location', url('/api/v1/').'/tipo/'.$nuevoTipo->codigo);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo=Tipo::find($id);
		if (!$tipo){
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra tipo con ese código.'])],404);
		}
        return response()->json(['status'=>'ok','data'=>$tipo],200);
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
        $tipo = Tipo::find($id);
        if(!$tipo){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra algun tipo con ese código.'])],404);
        }

        $nombre = $request->nombre;

        if($request->method() === 'PATCH'){
            $tipo->nombre = $nombre;
            $tipo->save();
            return response()->json(['status'=>'ok','data'=>$tipo], 200);
        }

        $tipo->nombre = $nombre;      
        $tipo->save();

        return response()->json(['status'=>'ok','data'=>$tipo], 200);
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
