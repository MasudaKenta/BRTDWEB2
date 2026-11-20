
<?php
require('conexao.php');
session_start();

$sql = "SELECT te.id, tse.des_status, tu.nome
        FROM tab_entrega AS te 
        INNER JOIN tab_status_entrega AS tse 
            ON tse.id = te.status
        LEFT JOIN tab_usuario AS tu 
            ON tu.id = te.id_entregador
        WHERE te.id_consumidor = '{$_SESSION['id_usuario']}'";

$stm = $conexao->prepare($sql);
$stm->execute();

while($res = $stm->fetch(PDO::FETCH_ASSOC)){
    echo "ID_ENTREGA: " . $res['id'] . " | STATUS: " . $res['des_status'] . " | ENTREGADOR: " . ($res['nome'] ? $res['nome'] : "Aguardando entregador"). "<br>";
}

echo "<a href=\"consumidor.php\">Voltar</a>" . "<br>";

?>
