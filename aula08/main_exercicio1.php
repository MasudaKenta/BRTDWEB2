<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <form action="tarefas.php" method="POST" enctype="multipart/form-data">
        <label for="">Nome </label>
        <input type="text" name="nome">
        <br>
        <label for="">Tarefa </label>
        <input type="text" name="tarefa">
        <br>
        <input type="submit" value="Enviar tarefa">
    </form>
</body>
</html>