<?php

namespace App\Http\Controllers;

use App\Persona;
use App\User;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    //usuarios NO socios
    public function index()
    {
        $persona = Persona::where('tipo',0)->where('estado',1)->get();

        return response()->json($persona, 200);
        //return view();    colocan la vista si queriene
    }

    //usuarios socios
    public function indexSocios()
    {
        $persona = Persona::where('tipo',1)->get();

        return response()->json($persona, 200);
        //return view();    colocan la vista si queriene
    }



    public function create()
    {
        //return view()   la vista del formulario
    }

    //AÑADIR USUARIOS
    public function store(Request $request)
    {
        $persona = new Persona($request->all());
        $persona->tipo = 0;
        $persona->estado = 1;

        $persona->save();

        $contra = $request->input('password');

        $user = new User();
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = bcrypt($contra);
        $user->id_persona = $request->input('carnet');

        $user->save();
        return response()->json($persona, 200);

        // return redirect()->route('nombre de la ruta');
    }

    // AÑADIR SOCIOS
    public function storeSocio(Request $request)
    {
        $persona = new Persona($request->all());
        $persona->tipo = 1;
        $persona->estado = 1;

        $persona->save();

        $contra = $request->input('password');

        $user = new User();
        $user->name = $request->input('nombre');
        $user->email = $request->input('email');
        $user->password = bcrypt($contra);
        $user->id_persona = $request->input('carnet');

        $user->save();

        return response()->json($persona, 200);
    }


    public function show( $carnet)
    {
        $persona = Persona::where('carnet',$carnet)->get();

        return response()->json($persona, 200);

        //return view()
    }


    public function edit( $carnet)
    {
        $persona = Persona::where('carnet', $carnet);
        //return view();
    }


    public function update(Request $request, $carnet)
    {
        $persona = Persona::findOrFail($carnet);

        $persona->nombre = $request->input('nombre');
        $persona->apellido = $request->input('apellido');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');

        $persona->update();

        return response()->json($persona, 200);

        //return redirect()->route();
    }


    public function destroy($carnet)
    {
        $persona = Persona::findOrFail($carnet);

        $persona->estado = 0;
        $persona->update();

        return json_encode('Eliminado');

        //return redirect()->route();
    }
}
