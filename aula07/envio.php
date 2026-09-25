<?php
    $user = $_POST["secret"];
    
    $text = $_POST["texto"];

    $image_tmp = $_FILES["arquivo"]["tmp_name"];
    $image = $_FILES["arquivo"]["name"];
    $path = "imagens/".$image;
    
    $res = move_uploaded_file($image_tmp, $path);

    $file = fopen("$user".".txt", "a");

    fwrite($file, "$text\n");
    fwrite($file, "$path\n");

    fclose($file);

    echo "envio registrado com sucesso!";
?>