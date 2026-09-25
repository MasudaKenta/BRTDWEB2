<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
<style>
    form {
        display: grid;
        gap: 10px;
        width: 300px;
    }

    label {
        display: grid;
        grid-template-columns: 70px 1fr;
        gap: 5px;
    }
</style>   
</head>
<body>
    <form action="login.php" method="POST" enctype="multipart/form-data">
        <label for="">Email</label>
        <input type="email" name="email">
        <!-- <br> -->
        <label for="">Senha</label>
        <input type="password" name="senha">
        <!-- <br> -->
        <input type="submit" value="Login">
        <!-- <br> -->
        <input type="reset" value="Limpar">
    </form>
</body>
</html>