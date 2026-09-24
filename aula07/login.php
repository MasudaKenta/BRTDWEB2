<?php
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $file = fopen("usuarios.txt", "r");

    $flag = 0;
    $nome = '';

    while(!feof($file)){
        $line = trim(fgets($file));
    
        if($line == '')
            break;

        $vetor = explode(";", $line);
        
        //print_r($vetor);

        if($vetor[1] == $email && $vetor[2] == $senha){
            $flag = 1;
            $nome = $vetor[0];
            break;    
        }
    }

    echo ($flag)?"Olá, ".$nome."!":"Dados incorretos, tente novamente.";
?>