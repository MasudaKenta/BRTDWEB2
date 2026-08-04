<?php
    $velocidade = $_GET['velocidade'];
    $limite = $_GET['limite'];

    if($velocidade > $limite)
        echo "Gerar multa";

    if($velocidade <= $limite)
        echo "Direção segura";
?>