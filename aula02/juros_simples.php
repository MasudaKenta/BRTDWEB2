<?php
    $C = $_GET['capital'];
    $i = $_GET['taxa'];
    $t = $_GET['tempo'];

    $i/=100;
    $J = $C * $i * $t;

    echo "Juros Simples calculado: R$ " . $J;
?>
