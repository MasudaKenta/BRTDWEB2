<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Entrega</title>
</head>
<body>
    <form action="solicitar_entrega.php" method='post' enctype='multipart/form-data'>
        <label for="">Largura</label>
        <input type="number" min="0" name="largura">
        <br>

        <label for="">Altura</label>
        <input type="number" min="0" name="altura">
        <br>

        <label for="">Profundidade</label>   
        <input type="number" min="0" name="profundidade">
        <br>

        <label for="">Peso</label>
        <input type="number" min="0" name="peso">
        <br>

        <label for="">Conteúdo sensível</label>
        <input type="radio" name="sensivel" value="1">
        <label for="">Sim</label>
        <input type="radio" name="sensivel" value="0">
        <label for="">Não</label>
        <br>

        <input type="submit" value="Cadastrar"> 
        <input type="reset" value="Limpar">    
    </form>    
</body>
</html>