<?php
    require("conexao.php");

    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = hash("sha256", $_POST['senha']);
    $tipo  = $_POST['tipo'];

    $sql = "INSERT INTO tab_usuario 
                (
                    id, 
                    nome, 
                    email, 
                    senha, 
                    cod_tipo_usuario
                ) 
                VALUES (NULL, '$nome', '$email', '$senha', '$tipo')";

    $res = $conexao->exec($sql);

    if($res > 0) {
        echo "Usuário cadastrado com sucesso! Redirecionando à tela de cadastro em 2s...";
    } else {
        echo "Erro ao cadastrar usuário!" . "<br>" . "<a href=\"usuario.php\">Tente Novamente</a>";
    }

    header("Refresh: 3; url=usuario.php");
?>
