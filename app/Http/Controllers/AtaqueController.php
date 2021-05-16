<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ataque;

use Illuminate\Support\Facades\Cache;

class AtaqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ataque=Cache::remember('cacheataque',15/60, function() {
            return Ataque::all();
        });
        return response()->json(['status'=>'ok','data'=>$ataque], 200);
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
        $nuevoAtaque=Ataque::create($request->all());
        return response()->json(['data'=>$nuevoAtaque], 201)->header('Location', url('/api/v1/').'/ataque/'.$nuevoAtaque->codigo);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ataque=Ataque::find($id);
		if (!$ataque){
			return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra ataque con ese código.'])],404);
		}
        return response()->json(['status'=>'ok','data'=>$ataque],200);
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
        $ataque = Ataque::find($id);
        if(!$ataque){
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra algun ataque con ese código.'])],404);
        }

        $nombre = $request->nombre;

        if($request->method() === 'PATCH'){
            $ataque->nombre = $nombre;
            $ataque->save();
            return response()->json(['status'=>'ok','data'=>$ataque], 200);
        }

        $ataque->nombre = $nombre;      
        $ataque->save();

        return response()->json(['status'=>'ok','data'=>$ataque], 200);
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
