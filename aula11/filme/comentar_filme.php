<?php
require('conexao.php');
require('funcoes.php');
session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo "<a href=\"login.php\">Necessário realizar login no sistema!</a>";
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$id_filme = isset($_POST['id_filme']) ? (int) $_POST['id_filme'] : 0;
$texto = isset($_POST['texto']) ? trim($_POST['texto']) : '';

if ($texto === '') {
    echo "O comentário não pode ser vazio!" . "<br>";
    echo "<a href=\"filmes.php\">Voltar</a>";
    exit;
}

if (!podeAcessarFilme($conexao, $id_usuario, $id_filme)) {
    echo "Você não pode comentar neste filme!" . "<br>";
    echo "<a href=\"filmes.php\">Voltar</a>";
    exit;
}

// A coluna comentario é varchar(300)
$texto = mb_substr($texto, 0, 300);

$stm = $conexao->prepare("INSERT INTO comentarios (id, id_usuario, id_filme, comentario) VALUES (NULL, :usuario, :filme, :texto)");
$stm->execute([
    ':filme'   => $id_filme,
    ':usuario' => $id_usuario,
    ':texto'   => $texto
]);

header("Location: filmes.php");
exit;
?>
