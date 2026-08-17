<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camiseta</title>
</head>
<body>
    <form action="camiseta_v2.php">
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

        <label for="">Informe a quantidade: </label>
        <input type="number" name="qtd" value="1" min="1" max="9">
        <br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>