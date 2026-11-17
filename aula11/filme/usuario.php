<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="cadastrar_usuario.php" method='post' enctype='multipart/form-data'>
        <label for="">Nome</label>
        <input type="text"  name="nome"><br><br>
        <label for="">E-mail</label>
        <input type="email" name="email"><br><br>
        <label for="">Data de Nascimento</label>
        <input type="date"  name="nascimento"><br><br>
        <label for="">Senha</label>
        <input type="password"  name="senha"><br><br>
        <input type="submit" value="Cadastrar"> 
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
