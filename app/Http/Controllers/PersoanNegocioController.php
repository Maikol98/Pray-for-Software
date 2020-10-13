<?php

namespace App\Http\Controllers;

use App\PersoanNegocio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PersoanNegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



    //ENVIAMOS DATOS POR FURMULARIO
    public function store(Request $request)
    {
        $negocio = new PersoanNegocio();
        $negocio->id_persona = $request->input('id_persona');
        $negocio->id_negocio = $request->input('id_negocio');
        $negocio->save();
        return response()->json($negocio, 200);
    }


    //ENVIAMOS DATOS POR RUTA
    public function stores(Request $request, $idPersona, $idNegocio)
    {
        $negocio = new PersoanNegocio();
        $negocio->id_persona = $idPersona;
        $negocio->id_negocio = $idNegocio;
        $negocio->save();
        return response()->json($negocio, 200);
    }



    // OBTENEMOS LAS PERSONAS QUE SON SOCIOS DE UN NEGOCIO
    public function show( $idNegocio)
    {
        $personas = DB::table('personanegocio')
            ->join('personas', 'personanegocio.id_persona', '=', 'personas.carnet')
            ->select('personas.carnet','personas.nombre','personas.telefono')
            ->where('personanegocio.id_negocio','=', $idNegocio)->get();
        return response()->json($personas, 200);
    }


     // OBTENEMOS LOS NEGOCIOS QUE TIENE UN SOCIO EN ESPEFICO
     public function showS( $idSocio)
     {
         $negocio = DB::table('personanegocio')
             ->join('negocios', 'personanegocio.id_negocio', '=', 'negocios.id')
             ->select('negocios.id','negocios.nombre')
             ->where('personanegocio.id_persona','=', $idSocio)->get();
         return response()->json($negocio, 200);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersoanNegocio  $persoanNegocio
     * @return \Illuminate\Http\Response
     */
    public function edit(PersoanNegocio $persoanNegocio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersoanNegocio  $persoanNegocio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersoanNegocio $persoanNegocio)
    {
        //
    }




    public function destroy(PersoanNegocio $persoanNegocio)
    {
        //
    }
}
