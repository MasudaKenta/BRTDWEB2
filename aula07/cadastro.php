<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $file = fopen("usuarios.txt", "a");

    $line = $nome . ';' . $email . ';' . $senha;
    
    fwrite($file, "$line\n");

    fclose($file);

    echo "Usuário cadastrado!";
?>

<a href="exibir.php">Exibir</a>