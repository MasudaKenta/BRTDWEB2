<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de filme</title>
</head>
<body>
    <h2>Cadastro de Filme</h2>
    
    <form action="cadastrar_filme.php"  method='post' enctype='multipart/form-data'>
        <label for="">Título</label>
        <input type="text" name="nome"> <br> <br>
        <label for="">Descrição</label>
        <input type="text" name="descricao"> <br> <br>
        <label for="">Foto</label>
        <input type="file" name="foto"> <br> <br>
        <label for="">Link</label>
        <input type="text" name="link"> <br> <br>
        <label for="">Classificação</label>
        <input type="number" name="classificacao" min="0" max="18" value="0"> <br> <br>
        <label for="">Nota</label>
        <input type="number" name="nota" min="0" max="10" value="0"> <br> <br>
        <input type="submit" value="Cadastrar"   >
        <input type="reset" value="Limpar">
    </form>
</body>
</html>
