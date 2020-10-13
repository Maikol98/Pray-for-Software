<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categoria = Categoria::where('estado',1)->get();

        return response()->json($categoria, 200);
    }


    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        $categoria = new Categoria($request->all());
        $categoria->estado = 1;
        $categoria->save();

        return response()->json($categoria, 200);
        //return json_encode('creado');
    }



    public function show(Categoria $categoria)
    {
        //
    }



    public function edit(Categoria $categoria)
    {
        //
    }



    public function update(Request $request, $categoria)
    {
        $categoria = Categoria::findOrFail($categoria);
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->update();

        return response()->json($categoria, 200);
    }



    public function destroy($categoria)
    {
        $categoria = Categoria::findOrFail($categoria);
        $categoria->estado = 0;
        $categoria->update();
        return json_encode('Eliminado');
    }
}
