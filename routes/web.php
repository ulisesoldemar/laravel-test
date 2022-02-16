<?php

use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Null_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola-mundo', function () {
    return view('paginas.hola-mundo');
});

// Route::get('/grabaciones', function () {
//     return view('paginas.grabaciones');
// });

// Se espera que se reciba una variable, en este caso
// nombre
Route::get('/grabaciones/{nombre}', function ($nombre) {
    // Se muere la aplicación y se retorna lo que se pasa
    // como parántro
    // dd($nombre);
    // Se pasa el parámetro a la vista a través del método
    // compact(), se pasa como string
    return view('paginas.grabaciones', compact('nombre'));
    // Hace lo mismo que la línea anterior, pero más verbose
    //return view('paginas.grabaciones')->with(['nombre' => $nombre]);
});

//  Con el ? se indica que es un parámetro opcional
Route::get('/grabaciones/{nombre}/{anio?}', function ($nombre, $anio = NULL) {
    return view('paginas.grabaciones', compact('nombre', 'anio'));
});
