
<?php
require('conexao.php');
session_start();

$email = $_POST['email'];
$senha = hash("sha256", $_POST['senha']);

$sql = "SELECT tu.id, tu.nome, tu.cod_tipo_usuario 
            FROM tab_usuario AS tu 
            WHERE tu.email = '$email' 
            AND tu.senha = '$senha'";

$stm = $conexao->prepare($sql);
$stm->execute();
$res = $stm->fetch(PDO::FETCH_ASSOC);

if(isset($res['id'])) {
    $_SESSION['id_usuario'] = $res['id'];
    $_SESSION['nome_usuario'] = $res['nome'];
    $_SESSION['tipo_usuario'] = $res['cod_tipo_usuario'];

    if($_SESSION['tipo_usuario'] == 1)
        header("Location: consumidor.php");
    if($_SESSION['tipo_usuario'] == 2)
        header("Location: entregador.php");
    if($_SESSION['tipo_usuario'] == 3)
        header("Location: gerente.php");
} else {
    echo "email ou senha incorretos!" . "<br>";
    echo "<a href=\"login.php\">Tente novamente</a>";
}
?>
