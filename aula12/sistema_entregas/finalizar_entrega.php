<?php
    require("conexao.php");
    session_start();

    $id_entrega = $_GET['id'];

    $sql = "UPDATE tab_entrega
            SET status = '3' 
            WHERE id = '$id_entrega'";

    $stm = $conexao->prepare($sql);
    $res = $stm->execute();

    header("Location: entregador.php");
?>
