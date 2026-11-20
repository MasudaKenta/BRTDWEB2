<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
</head>
<body>
    <h2>Tela de Login</h2>
    <form action="realizar_login.php"  method='post' enctype='multipart/form-data'>
        <label for="">E-mail</label>
        <input type="email" name='email'>
        <br>

        <label for="">Senha</label>
        <input type="password" name='senha'>
        <br>

        <input type="submit">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>