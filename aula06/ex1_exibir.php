<?php
    $file = fopen("receitas.md", "r");



    while(!feof($file)){
        $text = fgets($file);
        if(str_contains($text, "imagens/"))
            echo "<img src='$text' width='200px' height='100'>" . "<br>";
        else
            echo $text . "<br>";
    }
    fclose($file);
?>