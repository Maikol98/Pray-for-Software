<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $resultado = DB::table('users')->where('email',$email)
            ->first();
            // return response()->json($resultado, 200);
        if (is_null($resultado)) {
            return json_encode(0);
        }else {
            if(Hash::check($request->password, $resultado->password)){
                return response()->json($resultado, 200);
            }
            return json_encode(0);
        }
    }

    public function users(){
        $usuarios = DB::table('users')->get();
        return response()->json($usuarios);
    }
}
