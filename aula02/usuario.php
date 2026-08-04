<?php

    $idade = $_GET['idade'];
    $membro = $_GET['membro'];
    $convidado = $_GET['convidado'];

    if(($idade >= 18) && ($membro == 'Sim' || ($convidado == 'Sim')
        echo "Entrada permitida";
    else
        echo "Entrada negada";
    
?>
