<?php
    require('conexao.php');

    $id_oferta = $_POST['id_oferta'];

    $comando = "DELETE FROM ofertas WHERE `ofertas`.`id` = :id";

    $stm = $conexao->prepare($comando);
    $stm->execute([':id' => $id_oferta]);

    // 4. Verifica se o registro realmente existia e foi apagado
    if ($stm->rowCount() > 0) {
        echo "Oferta excluída com sucesso!";
        echo "<a href=\"ofertas.php?\">Voltar</a>";   
    } else {
        echo "Nenhuma oferta encontrado com esse ID.";
    }

?>