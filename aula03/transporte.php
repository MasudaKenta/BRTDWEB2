<?php

    $transporte = $_GET['transporte'];
    $transporte = trim($transporte);
    $transporte = strtolower($transporte);

    if($transporte == "carro"){
        echo "<img src='imagens/carro.jpeg' alt='' width='400px' height='200px'>";
    }
    else if($transporte == "moto"){
        echo "<img src='imagens/moto.jpg' alt='' width='400' height='200'>";
    }
    else if($transporte == "ônibus"){
        echo "<img src='imagens/onibus.jpg' alt='' width='400' height='200'>";
    }
    else if($transporte == "avião"){
        echo "<img src='imagens/aviao.jpg' alt='' width='400' height='200'>";
    }
    else if($transporte == "navio"){
        echo "<img src='imagens/navio.jpg' alt='' width='400' height='200'>";
    }
    else
        echo "Transporte não definido.";

?>
