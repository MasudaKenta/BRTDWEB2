<?php
    require('conexao.php');
    session_start();

    echo "Olá, <strong>{$_SESSION['nome_usuario']}</strong>!" . '<br><br>';

    echo "• <a href=\"entrega.php\">Solicitar entrega/</a>" . "<br>";
    echo "• <a href=\"solicitacoes.php\">Verificar solicitações/</a>" . "<br><br>";

    echo "<a href=\"sair.php\">Sair</a>";
?>