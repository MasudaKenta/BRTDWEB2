<?php
    $tipo = $_GET['tipo'];
    $tamanho = $_GET['tamanho'];

    $valor;

    if($tipo == "masculino")
        $valor = 30;
    else if($tipo == "feminino")
        $valor = 25;

    if($tamanho == "P")
        $valor -= 5;
    else if($tamanho == "M")
        $valor += 1;
    else if($tamanho == "G")
        $valor +=10;

    echo "O valor da camiseta será R$" . $valor;
?>