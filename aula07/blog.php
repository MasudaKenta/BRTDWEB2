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

    if($flag){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="inserir.php">
        <!-- <label for=""></label> -->
        <textarea name="texto"></textarea>
    </form>
</body>
</html>
<?php
    }
    else{
        echo "Login ou senha incorretos!";
    }
?>