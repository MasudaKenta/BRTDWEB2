<?php
// Retorna true se o filme é do próprio usuário ou de um amigo dele
function podeAcessarFilme($conexao, $id_usuario, $id_filme) {
    $comando = "SELECT f.id
                FROM filmes AS f
                WHERE f.id = :id_filme
                AND (f.id_usuario = :usuario1
                     OR f.id_usuario IN (SELECT id_amigo FROM amigos WHERE id_usuario = :usuario2))";
    $stm = $conexao->prepare($comando);
    $stm->execute([
        ':id_filme' => $id_filme,
        ':usuario1' => $id_usuario,
        ':usuario2' => $id_usuario
    ]);
    return $stm->fetch(PDO::FETCH_ASSOC) !== false;
}
?>
