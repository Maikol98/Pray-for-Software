<?php

namespace App\Http\Controllers;

use App\Negocio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NegocioController extends Controller
{

    //TE ACTIVA EL BUSCAR SOCIO ALV (actualiza los valores)
    public function socio( $idNegocio ){
        $negocio = Negocio::findOrFail($idNegocio);
        $negocio->buscasocio = 1;
        $negocio->update();

        return json_encode('actualizado');
    }

    //BUSCAN SOCIOS
    public function index()
    {
        $negocio = DB::table('negocios')
            ->join('imagenes','negocios.id','=','imagenes.id_negocio')
            ->select('imagenes.url','negocios.nombre')
            ->where('negocios.buscasocio', 1)->get();

        return response()->json($negocio, 200);
    }


    public function create()
    {
        //retorna una vista
    }


    public function store(Request $request)
    {
        $negocio = new Negocio($request->all());
        $negocio->buscasocio = 0;
        $negocio->estado = 1;
        $negocio->save();

        return response()->json($negocio, 200);
    }

    //--------hay que probarlo----------
    public function show( Request $request)
    {
        $id = $request->input('nombre');

        $negocio = DB::table('negocios')
            ->where('nombre', 'like', '%'.$id.'%' )->get();

        return response()->json($negocio, 200);
    }


    public function edit(Negocio $negocio)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $negocio = Negocio::findOrFail($id);

        $negocio->nombre = $request->input('nombre');
        $negocio->descripcion = $request->input('descripcion');

        $negocio->update();

        return response()->json($negocio, 200);
    }


    public function destroy( $id)
    {
        $negocio = Negocio::findOrFail($id);
        $negocio->estado = 0;

        $negocio->update();

        return json_encode('eliminado');
    }
}
