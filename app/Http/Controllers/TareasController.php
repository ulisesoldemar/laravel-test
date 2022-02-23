<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = DB::table('tareas')->get();
        //dd($tareas);
        return view('tareas.indexTareas', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.formTareas');
    }
}
