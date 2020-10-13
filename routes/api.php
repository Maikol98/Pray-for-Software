<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'userController@login');

//--------------------CATEGORIA----------------
Route::apiResource('Categoria','CategoriaController'); //-


//------------------COMENTARIO----------------
//ruta para nuevo comentario sin pedir
Route::post('Comentario','ComentarioController@store');//-
//ruta para nuevo comentario pidiendo nombres ruta
Route::post('Comentario/{idNegocio}/{idPersona}','ComentarioController@storeN'); //-
Route::get('Comentario/{idNegocio}','ComentarioController@show'); //-


//------------------IMAGEN--------------------

//------------------NEGOCIO-------------------
//CATALOGO es el index
Route::post('todos','NegocioController@Todos');
Route::apiResource('Negocio','NegocioController'); //-
Route::get('Negocio/buscar','NegocioController@show'); //-

//------------------PERSONA-------------------
Route::get('Persona','PersonaController@index'); //-
Route::get('Socio','PersonaController@indexSocios'); //-
Route::post('Persona','PersonaController@store'); //-
Route::post('Socio','PersonaController@storeSocio'); //-
Route::get('Persona/{carnet}','PersonaController@show'); //-
Route::put('Persona/{carnet}','PersonaController@update'); //-
Route::put('Persona/{carnet}/destroy','PersonaController@destroy'); //-


//------------------PERSONANEGOCIO-----------
Route::post('PersonaNegocio','PersoanNegocioController@store'); //-
Route::post('PersonaNegocio/{idPersona}/{idNegocio}','PersoanNegocioController@stores'); //-
//-----obtenemos la persona que son socios
Route::get('PersonaNegocio/{idNegocio}','PersoanNegocioController@show');//-
//-----obtenemos los negocios que tienen un socio especifico
Route::get('PersonaNegocio/{idSocio}/Negocios','PersoanNegocioController@showS');//-

//------------------UBICACION----------------
Route::apiResource('Ubicacion','UbicacionController');
