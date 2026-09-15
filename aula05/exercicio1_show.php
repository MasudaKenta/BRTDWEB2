<?php

    $file = fopen("diario.md", "r");

    
    while(!feof($file)){
        $text = fgets($file);
        echo $text . "<br>";
    }
    fclose($file);
?>
