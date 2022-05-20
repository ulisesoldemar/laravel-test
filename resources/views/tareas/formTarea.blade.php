<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CREAR TAREA</h1>
    <!-- Muestra el error -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @isset($tarea)
        <form action="/tareas/{{ $tarea->id }}" method="PUT">  <!-- Actualizar UPDATE -->
        @method('PATCH')
    @else
        <form action="/tareas" method="POST"> 
    @endisset 
        @csrf
        <label for="tarea">Tarea</label>
        <!-- Old mantiene el valor en caso de no pasar una validación -->
        <input type="text" name="tarea" id="tarea" value="{{ $tarea->nombre }} {{ old('tarea') }}">
        <br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="categoria" value="{{ $tarea->descripcion }} {{ old('descripcion') }}" cols="30" rows="10"></textarea>
        <br>
        <label for="categoria">Categoría</label>
        <select name="categoria" id="">
            <option value="Escuela">Escuela</option>
            <option value="Trabajo">Trabajo</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>