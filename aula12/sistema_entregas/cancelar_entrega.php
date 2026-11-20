<?php
    require("conexao.php");
    session_start();

    if(!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 3) {
        header("Location: login.php");
        exit;
    }

    $id_entrega = $_GET['id'];

    $sql = "UPDATE tab_entrega
            SET status = '4' 
            WHERE id = '$id_entrega'";

    $stm = $conexao->prepare($sql);
    $res = $stm->execute();

    header("Location: gerente.php");
?>
