<?php
    session_start();

    if(isset($_SESSION["nome"])){
        echo "Usuário <strong>" . $_SESSION["nome"] . "</strong> logado com sucesso!";
    }
    else{
        echo "Acesse a página de login!" . "<br>";
        echo "<a href='logar.php'>Página de Login</a>";
    }

    session_destroy();
?>