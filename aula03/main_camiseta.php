<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camiseta</title>
</head>
<body>
    <form action="camiseta.php">
        <label for="">Seleciona o tipo da camiseta:</label>
        <br>
        <input type="radio" name="tipo" value="masculino">
        <label for="">Masculino</label>
        <br>

        <input type="radio" name="tipo" value="feminino">
        <label for="">Feminino</label>
        <br>

        <label for="">Selecione o tamanho da camiseta:</label>
        <br>
        <input type="radio" name="tamanho" value="P">
        <label for="">P</label>
        <br>

        <input type="radio" name="tamanho" value="M">
        <label for="">M</label>
        <br>

        <input type="radio" name="tamanho" value="G">
        <label for="">G</label>
        <br>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>