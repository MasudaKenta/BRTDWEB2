<?php

    $nome = $_GET['nome'];
    $n1 = $_GET['nota1'];
    $n2 = $_GET['nota2'];
    $n3 = $_GET['nota3'];

    $file = fopen("notas.txt", 'a');

    fwrite($file, "$nome,$n1,$n2,$n3\n");

    fclose($file);

    echo "Notas do " . $nome . ' salvas com sucesso!';
?>