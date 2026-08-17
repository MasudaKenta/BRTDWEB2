<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:  <?php $color = $_GET['corFundo']; echo $color;?> 
        }

        p{
            color: <?php $color = $_GET['corTexto']; echo $color;?> 
        }
    </style>
</head>
    <p>
        <?php
            $texto = $_GET['texto'];
            echo $texto;
        ?>
    </p>
</body>
</html>