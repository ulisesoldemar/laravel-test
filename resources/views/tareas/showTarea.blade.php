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
            <th>Usario</th>
            <th>Tarea</th>
            <th>Descripción</th>
            <th>Categoría</th>
        </tr>
        <tr>
            <td>{{ $tarea->id }}</td>
            <td>{{ $tarea->user->name }}</td>
            <td>{{ $tarea->tarea }}</td>
            <td>{{ $tarea->descripcion }}</td>
            <td>{{ $tarea->categoria }}</td>
        </tr>
    </table>
</body>
</html>