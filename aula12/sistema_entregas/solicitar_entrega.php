<?php
    require("conexao.php");
    session_start();

    $largura  = $_POST['largura'];
    $altura  = $_POST['altura'];
    $profundidade  = $_POST['profundidade'];
    $peso  = $_POST['peso'];
    $sensivel  = $_POST['sensivel'];

    $sql = "INSERT INTO tab_entrega
                (
                    id, 
                    id_consumidor, 
                    largura,
                    altura,
                    profundidade,
                    peso, 
                    sensivel, 
                    status
                ) 
                VALUES (NULL, '{$_SESSION['id_usuario']}', '$largura', '$altura', '$profundidade', '$peso', '$sensivel', '1')";

    $res = $conexao->exec($sql);

    if($res > 0) {
        echo "Entrega cadastrada com sucesso! Redirecionando à tela de cadastro em 2s...";    
        header("Refresh: 2; url=consumidor.php");
    } else {
        echo "Erro ao cadastrar entrega!" . "<br>" . "<a href=\"usuario.php\">Tente Novamente</a>";
    }

?>
