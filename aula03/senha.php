<?php
    $email  = $_GET['email'];
    $senha = $_GET['senha'];
    $email = trim($email);
    $senha = trim($senha);

    if($email == "fulano@email.com" && $senha == "1234Thanos"){
        echo "Usuário autenticado";
    }
    else{
        echo "Email ou senha incorretos!";
    }
?>