<?php

    $file = fopen("usuarios.txt", "r");

    while(!feof($file)){
        $line = fgets($file);

        echo $line . "<br>";
    }

?>