<?php

    $texto = $_GET['texto'];

    $file = fopen("diario.md", 'a');

    fwrite($file, "$texto\n");

    fclose($file);

    echo "Texto inserido no diário com sucesso!";
?>