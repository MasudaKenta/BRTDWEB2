<?php
require('conexao.php');
session_start();

$id_solicitacao = $_GET['id_solicitacao'];

$comando = "SELECT p.id, p.id_usuario, p.id_amigo
            FROM pendente as p 
            WHERE p.id = $id_solicitacao";
$stm = $conexao->prepare($comando);
$stm->execute();

$resultado = $stm->fetch(PDO::FETCH_ASSOC);

$id_usuario = $resultado['id_usuario'];
$id_amigo = $resultado['id_amigo'];


$comando2 = "INSERT INTO amigos (id, id_usuario, id_amigo) VALUES 
            (NULL, $id_usuario, $id_amigo),
            (NULL, $id_amigo, $id_usuario)";

$linhas = $conexao->exec($comando2);

if($linhas > 0) {
    echo "Solicitação aprovada com sucesso!" . "<br>";
} else {
    echo "Erro ao aprovar solicitação";
}

$comando3 = "UPDATE pendente SET pendente = 1 WHERE id = $id_solicitacao";
$stm3 = $conexao->prepare($comando3);
$resultado3 = $stm3->execute();

echo "<a href=\"amigos.php\">Voltar</a>";
?>