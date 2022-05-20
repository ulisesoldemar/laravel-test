<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Tarea;
use Auth;
use Illuminate\Http\Request;


class TareaController extends Controller
{

    private $reglasValidacion = [
        'tarea' => 'required|min:5|max:255',
        'descripcion' => ['required', 'min:5'],
        'categoria' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tareas = Tarea::get();
        //$tareas = Tarea::all();
        // Precarga las relaciones para evitar realizar múltiples
        // consultas a la base de datos
        // con los dos puntos ':' se indica que columnas traer
        // con el punto '.' llama al método del modelo, en este caso
        // ubicación, debe ser un método
        $tareas = Tarea::with('user:id,name,email', 'etiquetas.ubicacion')->get();
        // Como atributo, traigo todo el campo tareas de la tabla
        //$tareas = Auth::user()->tareas;
        // Como método, me permite modificar el query builder
        //$tareas = Auth::user()->tareas()->where(); 
        return view('tareas.indexTarea', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$etiquetas = Etiqueta::all();
        $etiquetas = Etiqueta::with('tareas');
        return view('tareas.formTarea', ['etiquetas' => $etiquetas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->reglasValidacion);

        // $tarea = new Tarea();
        // $tarea->tarea = $request->tarea;
        // $tarea->descripcion = $request->descripcion;
        // $tarea->categoria = $request->categoria;

        // Merge añade al request un campo más
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $tarea = Tarea::create($request->all());

        // Sin necesidad de ingresar el id, se guarda en el registro del
        // usuario
        //$user = Auth::user();
        //$user->tareas()->save($tarea);

        //$tarea->save();

        // Se crea la relación entre la tabla tarea y la etiqueta
        $tarea->etiquetas()->attach($request->etiqueta_id);
        return redirect('/tareas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.showTarea', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        //$etiquetas = Etiqueta::all();
        $etiquetas = Etiqueta::with('tareas');
        return view('tareas.formTarea', compact('tarea'), ['etiquetas' => $etiquetas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate($this->reglasValidacion);
        // $tarea->tarea = $request->tarea;
        // $tarea->descripcion = $request->descripcion;
        // $tarea->categoria = $request->categoria;
        // $tarea->save();

        // Actualiza la tarea con el id correcto, insertando en todos los campos
        // ignorando el method = 'PATCH' y el csrf del formulario
        Tarea::where('id', $tarea->id)
            ->update($request->except(['_method', '_token', 'etiqueta_id',]));

        $tarea->etiquetas()->sync($request->etiqueta_id);
        return redirect('/tareas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
