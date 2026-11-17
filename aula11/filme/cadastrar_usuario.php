<?php
    require("conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $senha = hash("sha256", $_POST['senha']);

    $comando = "INSERT INTO `usuarios` (`id`, `nome`, `email`, `nascimento`, `senha`) VALUES (NULL, '$nome', '$email', '$nascimento', '$senha')";

    $linhas = $conexao->exec($comando);

    if($linhas > 0) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário!" . "<a href=\"usuario.php\">Tente Novamente</a>";
    }
?>

