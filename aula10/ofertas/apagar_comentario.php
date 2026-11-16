<?php
    require('conexao.php');

    $id_comentario = $_POST['id_comentario'];

    $comando = "DELETE FROM `comentarios` WHERE `comentarios`.`id` = :id";

    $stm = $conexao->prepare($comando);
    $stm->execute([':id' => $id_comentario]);

    // 4. Verifica se o registro realmente existia e foi apagado
    if ($stm->rowCount() > 0) {
        echo "Comentário excluída com sucesso!"; 
    } else {
        echo "Nenhum comentário encontrado com esse ID.";
    }

?>