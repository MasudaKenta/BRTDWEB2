<?php
    require('conexao.php');
    session_start();

    $id_usuario = $_SESSION['id'];
    $id_oferta = $_POST['id_oferta'];
    $comentario = $_POST['comentario'];

    $comando = "INSERT INTO `comentarios` (`id`, `id_usuario`, `id_oferta`, `comentario`) VALUES (NULL, '$id_usuario', '$id_oferta', '$comentario')";

    $linhas = $conexao->exec($comando);

    if($linhas > 0) {
        echo "Comentário salvo com sucesso!" . "<br>";
        echo "<a href=\"detalhe_oferta.php?id=$id_oferta\">Voltar</a>";
    } else {
        echo "Erro ao comentar!";
    }

?>

