<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receita</title>
</head>
<body>
    <form action="ex1_receita.php" method="POST" enctype="multipart/form-data">
        <label for="">Nome: </label>
        <br>
        <input type="text" name="nome">
        <br>
        <br>
        <label for="">Foto:</label>
        <input type="file" name="foto">
        <br>
        <br>
        <label for="">Ingredientes</label>
        <br>
        <textarea name="ingredientes" rows="10" cols="50"></textarea>
        <br>
        <label for="">Modo de Preparo</label>
        <br>
        <textarea name="preparo" rows="10" cols="50"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>