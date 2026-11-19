<?php
require('conexao.php');
session_start();

    $comando = "SELECT a.id_usuario, a.id_amigo, u.nome 
            FROM amigos AS a 
            INNER JOIN usuarios AS u ON u.id = a.id_amigo 
            WHERE a.id_usuario = {$_SESSION['id_usuario']}";
    $stm = $conexao->prepare($comando);
    $stm->execute();

    $comando2 = "SELECT p.id, p.id_usuario, p.id_amigo, u.nome 
            FROM pendente as p 
            INNER JOIN usuarios AS u ON u.id = p.id_amigo 
            WHERE p.id_amigo = {$_SESSION['id_usuario']}
            AND p.pendente = 0";
    $stm2= $conexao->prepare($comando2);
    $stm2->execute();

    $comando3 = "SELECT id, nome 
            FROM usuarios 
            WHERE id != {$_SESSION['id_usuario']}";
    $stm3= $conexao->prepare($comando3);
    $stm3->execute();

    echo "<h2>Amigos</h2>";
    while($resultado = $stm->fetch(PDO::FETCH_ASSOC)){
        echo "{$resultado['nome']}" . "<br>";
    }

    echo "<h2>Solicitações pendentes</h2>";
    while($resultado2 = $stm2->fetch(PDO::FETCH_ASSOC)){
        echo "{$resultado2['nome']}";
        echo "&nbsp&nbsp<a href=\"aprovar_solicitacao.php?id_solicitacao={$resultado2['id']}\">Aprovar</a>" . "<br>";
    }

    echo "<h2>Usuários</h2>";
    while($resultado3 = $stm3->fetch(PDO::FETCH_ASSOC)){
        echo "{$resultado3['nome']}";
        echo "&nbsp&nbsp<a href=\"solicitar_amizade.php?id_amigo={$resultado3['id']}\">Solicitar amizade</a>" . "<br>";
    }
?>

