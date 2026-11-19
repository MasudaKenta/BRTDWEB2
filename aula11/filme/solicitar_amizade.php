<?php
require('conexao.php');
session_start();

$id_amigo = $_GET['id_amigo'];

$comando = "INSERT INTO `pendente` (`id`, `id_usuario`, `id_amigo`) VALUES (NULL, '{$_SESSION['id_usuario']}', '$id_amigo')";

$linhas = $conexao->exec($comando);

if($linhas > 0) {
    echo "Solicitação enviado com sucesso!" . "<br>";
    echo "<a href=\"amigos.php\">Voltar</a>";
} else {
    echo "Erro ao enviar solicitação";
    echo "<a href=\"amigos.php\">Voltar</a>";
}


?>