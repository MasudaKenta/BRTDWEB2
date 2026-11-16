<?php
require('conexao.php');

$comando = "SELECT `id`, `foto`, `preco` FROM `ofertas` ORDER BY `id` DESC";

$stm = $conexao->prepare($comando);
$stm->execute();

while($resultado = $stm->fetch(PDO::FETCH_ASSOC)) {
    echo "<a href=\"detalhe_oferta.php?id={$resultado['id']}\"><img src='{$resultado['foto']}' height='100px'></a>";
    echo "<br><h2>";
    echo $resultado['preco'];
    echo "</h2>";

?>

<form action="apagar_oferta.php" method='post' enctype='multipart/form-data'>
    <input type="hidden" name="id_oferta" value="<?php echo "{$resultado['id']}"?>">
    <input type="submit" value="Apagar oferta">
    <br>
</form>

<?php

}

?>
