<?php
    require('conexao.php');
    session_start();

    $id_usuario = $_SESSION['id_usuario'];

    if(isset($_SESSION['id_usuario'])){
        $nome          = $_POST['nome'];
        $descricao     = $_POST['descricao'];

        $foto          = $_FILES['foto']['name'];
        $foto_tmp      = $_FILES['foto']['tmp_name'];
        $destino       = "imagens/$foto";

        $res = move_uploaded_file($foto_tmp, $destino);

        $link          = $_POST['link'];
        $classificacao = $_POST['classificacao'];
        $nota          = $_POST['nota'];

        if($classificacao > $_SESSION['idade_usuario']){
            echo "Não é possível cadastrar um filme com classificação indicativa inadequada para o seu usuário!" . "<br>";
            echo "<a href=\"filme.php\">Cadastre outro filme!</a>";
        }
        else{   
            $comando = "INSERT INTO `filmes` (`id`, `id_usuario`, `nome`, `descricao`, `foto`, `link`, `classificacao`, `nota_usuario`) VALUES (NULL, '$id_usuario', '$nome', '$descricao', '$destino', '$link', '$classificacao', '$nota')";

            $linhas = $conexao->exec($comando);

            if($linhas > 0) {
                echo "Filme cadastrado com sucesso!" . "<br>";
                echo "<a href=\"filme.php\">Voltar para tela de cadastro</a>";
            } else {
                echo "Erro ao cadastrar o filme.";
                echo "<a href=\"filme.php\">Voltar para tela de cadastro</a>";
            }
        }
    }
    else{
        echo "<a href=\"login.php\">Necessário realizar login no sistema!</a>";
    }

?>