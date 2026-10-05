<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página para salvar usuários</title>
</head>
<body>
    <form action="save_user.php" method="POST" enctype="multipart/form-data">
        <label for="">Nome</label>
        <input type="text" name="nome">
        <br>
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Senha</label>
        <input type="password" name="senha">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>