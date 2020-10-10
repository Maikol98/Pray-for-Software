<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Negocio;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{


    public function index()
    {
        //
    }



    public function create()
    {
        //
    }


    //CON ESTE OBTENEMOS EL ID NEGOCIO Y PERSONA DEL FORMNULARIO
    public function store(Request $request)
    {
        $comentario = new Comentario();
        $comentario->titulo = $request->input('titulo');
        $comentario->descripcion = $request->input('descripcion');
        $comentario->id_persona = $request->input('id_persona');
        $comentario->id_negocio = $request->input('id_negocio');
        $comentario->save();

        return response()->json($comentario, 200);
    }

    //CON ESTE ENVIAMOS LOS ID MEDIANTE LA RUTA
    public function storeN(Request $request, $idNegocio, $idPersona)
    {
        $comentario = new Comentario();
        $comentario->titulo = $request->input('titulo');
        $comentario->descripcion = $request->input('descripcion');
        $comentario->id_persona = $idPersona;
        $comentario->id_negocio = $idNegocio;
        $comentario->save();

        return response()->json($comentario, 200);
    }


    //OBTENEMOS TODOS LOS COMENTARIOS DE UN NEGOCIO
    public function show( $idNegocio)
    {
        $comentario = Comentario::where('id_negocio', $idNegocio)->get();
        return response()->json($comentario, 200);
    }



    public function edit(Comentario $comentario)
    {
        //
    }


    //VERIFICAMOS SI PUEDE ACTUALIZAR O NELL
    public function actualizar($idComentario, $idPersona){
        $comentario = Comentario::findOrFail($idComentario);

        if ($comentario->id_persona == $idPersona) {
            return json_encode(1); //PUEDE ACTUALIZAR
        }
        return json_encode(0);  //NO PUEDE ACTUALIZAR
    }

    public function update(Request $request, $idComentario, $idPersona)
    {
        $comentario = Comentario::findOrFail($idComentario);

        //if ($comentario->id_persona == $idPersona) {
            $comentario->titulo = $request->input('titulo');
            $comentario->descripcion = $request->input('descripcion');
            $comentario->update();
            return response()->json($comentario, 200);
        //}

        //return json_encode('No puede actualizar');
    }



    public function destroy( $idComentario)
    {
        $comentario = Comentario::findOrFail($idComentario);
        $comentario->delete();

        return json_encode('Eliminado');
    }
}
