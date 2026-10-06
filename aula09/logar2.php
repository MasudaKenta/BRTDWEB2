<?php
    //iniciar sessão
    session_start();

    //conexão com banco     
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "site";
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $comando = "SELECT `nome`, `email` FROM `usuarios` WHERE `nome` = '$nome' AND `email` = '$email'";

    $stm = $conexao->prepare($comando);
    $stm->execute();

    if($resultado = $stm->fetch(PDO::FETCH_ASSOC)){
        $_SESSION["nome"] = $resultado["nome"];
    }
    else{
        echo "Usuário ou email incorretos!" . "<br>";
    }

    echo "<a href='verificar.php'>Verificar</a>";

?>