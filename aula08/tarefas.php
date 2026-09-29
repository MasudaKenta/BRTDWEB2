<?php

    $nome = $_POST["nome"];
    $tarefa = $_POST["tarefa"];

    $filename = $nome . ".md";
    if(is_writable($filename)){
        $file = fopen($filename, "a");
    }
    else{
        $file = fopen($filename, "w");
    }

    fwrite($file, ". $tarefa\n");

    echo "Tarefa salva com sucesso!";
    fclose($file);
?>