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
<style>
    form {
        display: grid;
        gap: 10px;
        width: 300px;
    }

    label {
        display: grid;
        grid-template-columns: 150px 10fr;
        gap: 5px;
    }
</style>   
</head>
<body>
    <?php
        echo "Bem-vindo, $nome!";
    ?>
    <form action="envio.php"  method="POST" enctype="multipart/form-data">
        <!-- <label for=""></label> -->
        <br>
        <label for="">Insira o texto de envio</label>
        <textarea name="texto"></textarea>
        <!-- <br><br> -->
        <label for="">Insira a imagem</label>
        <!-- <br> -->
        <input type="file" name="arquivo">
        <input type="hidden" name="secret" value="<?php echo $nome?>">
        <!-- <br> -->
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
    }
    else{
        echo "Login ou senha incorretos!";
    }
?>