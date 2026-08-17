<?php
    $tipo = $_GET['tipo'];
    $tamanho = $_GET['tamanho'];
    $qtd = $_GET['qtd'];

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

    $desconto = (3 * $qtd * $valor)/100;
    $res = $valor*$qtd - ($desconto * $qtd);

    echo "O valor total da compra será R$" . $res;
?>