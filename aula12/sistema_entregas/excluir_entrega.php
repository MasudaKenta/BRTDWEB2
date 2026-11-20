<?php
    require("conexao.php");
    session_start();

    if(!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 3) {
        header("Location: login.php");
        exit;
    }

    $id_entrega = $_GET['id'];

    $sql = "DELETE FROM tab_entrega
            WHERE id = '$id_entrega'";

    $stm = $conexao->prepare($sql);
    $res = $stm->execute();

    header("Location: gerente.php");
?>
