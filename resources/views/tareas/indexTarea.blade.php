<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
</head>
<body>
    <h1>TAREAS</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Tarea</th>
            <th>Descripción</th>
            <th>Categoría</th>
        </tr>
        @foreach ($tareas as $tarea)            
        <tr>
            <td>{{ $tarea->id }}</td>
            <!-- Nos permite acceder al nombre del usuario -->
            <td>{{ $tarea->user->name }}</td>
            <td>{{ $tarea->tarea }}</td>
            <td>{{ $tarea->descripcion }}</td>
            <td>{{ $tarea->categoria }}</td>
            <td>
                <a href="/tareas/{{ $tarea->id }}">Ver detalle</a> | 
                <a href="/tareas/{{ $tarea->id }}/edit">Editar</a>
                <form action="/tareas/{{ $tarea->id }}/" method="POST">
                    @csrf
                    @method('DESTROY')

                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>