<?php
require('conexao.php');

$i = $_GET['id'];

$comando = "SELECT * FROM `ofertas` WHERE `id` = $i";

$stm = $conexao->prepare($comando);
$stm->execute();

while($resultado = $stm->fetch(PDO::FETCH_ASSOC)) {
    echo "<img src='{$resultado['foto']}' height='100px'>";
    echo "<h1>{$resultado['nome']}</h1>";
    echo "<p>{$resultado['descricao']}</p>";
    echo "<h3>{$resultado['preco']}</h3>";
    echo "<a href='{$resultado['link']}'>Comprar</a>";

    $comando2 = "SELECT `id`, `id_oferta`, `comentario` FROM `comentarios` WHERE `id_oferta` = {$resultado['id']}";
    $stm2 = $conexao->prepare($comando2);
    $stm2->execute();

    echo "<h2>Comentários</h2>";

    while($resultado2 = $stm2->fetch(PDO::FETCH_ASSOC)){
        echo "<p> - {$resultado2['comentario']}</p>";
?>

        <form action="apagar_comentario.php" method='post' enctype='multipart/form-data'>
            <input type="hidden" name="id_comentario" value="<?php echo "{$resultado2['id']}"?>">
            <input type="submit" value="Apagar comentário">
            <br>
        </form>

<?php 

    }
    
?>

<form action="cadastrar_comentario.php" method='post' enctype='multipart/form-data'>
    <input type="hidden" name="id_oferta" value="<?php echo $i?>">
    <textarea name="comentario"></textarea>
    <br>
    <input type="submit" value="Comentar">
</form>

<?php

}

?>
