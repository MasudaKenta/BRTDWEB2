<?php
require('conexao.php');
require('funcoes.php');
session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo "<a href=\"login.php\">Necessário realizar login no sistema!</a>";
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$id_filme = isset($_GET['id_filme']) ? (int) $_GET['id_filme'] : 0;

if (!podeAcessarFilme($conexao, $id_usuario, $id_filme)) {
    echo "Você não pode curtir este filme!" . "<br>";
    echo "<a href=\"filmes.php\">Voltar</a>";
    exit;
}

// Verifica se já curtiu
$stm = $conexao->prepare("SELECT id FROM curtidas WHERE id_usuario = :usuario AND id_filme = :filme");
$stm->execute([':usuario' => $id_usuario, ':filme' => $id_filme]);
$curtida = $stm->fetch(PDO::FETCH_ASSOC);

if ($curtida) {
    // Já curtiu: remove a curtida (descurtir)
    $stm2 = $conexao->prepare("DELETE FROM curtidas WHERE id = :id");
    $stm2->execute([':id' => $curtida['id']]);
} else {
    $stm2 = $conexao->prepare("INSERT INTO curtidas (id, id_usuario, id_filme) VALUES (NULL, :usuario, :filme)");
    $stm2->execute([':usuario' => $id_usuario, ':filme' => $id_filme]);
}

header("Location: filmes.php");
exit;
?>
