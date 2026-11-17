
<?php
require('conexao.php');
session_start();
date_default_timezone_set('America/Sao_Paulo');

$email = $_POST['email'];
$senha = hash("sha256", $_POST['senha']);

$comando = "SELECT `id`, `nome`, `nascimento` FROM `usuarios` WHERE `email` = '$email' AND `senha` = '$senha'";
$stm = $conexao->prepare($comando);
$stm->execute();
$resultado = $stm->fetch(PDO::FETCH_ASSOC);

$dataNascimento = $resultado['nascimento'];
$dataNascimento = new DateTime($dataNascimento);
$hoje = new DateTime();
$idade = $dataNascimento->diff($hoje)->y;

if(isset($resultado['id'])) {
    $_SESSION['id_usuario'] = $resultado['id'];
    $_SESSION['nome_usuario'] = $resultado['nome'];
    $_SESSION['idade_usuario'] = $idade;

    echo "Olá {$resultado['nome']}!" . '<br>';
    echo "<a href=\"filme.php\">Cadastrar filme</a>";
    echo "<a href=\"sair.php\">Sair</a>";
} else {
    echo "email ou senha incorretos!" . "<br>";
    echo "<a href=\"login.php\">Tente novamente</a>";
}
?>
