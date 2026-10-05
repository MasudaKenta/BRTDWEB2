<?php
    //conexão
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "site";
    
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    //fim trecho conexão

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $command = "INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES (NULL, '$nome', '$email', '$senha')";

    $rowcount = $conexao->exec($command);

    if($rowcount > 0){
        echo "Usuário cadastrado!";
    }
    else{
        echo "Erro ao cadastrar usuário!";
    }

?>