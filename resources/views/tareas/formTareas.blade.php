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
    <form action="/tareas/store" method="post">
        <label for="tarea">Tarea</label>
        <input type="text" name="tarea" id="tarea">
        <br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="categoria" cols="30" rows="10"></textarea>
        <br>
        <label for="categoria">Categoría</label>
        <select name="categoria" id="">
            <option value="escuela">Escuela</option>
            <option value="trabajo">Trabajo</option>
        </select>
    </form>
</body>
</html>