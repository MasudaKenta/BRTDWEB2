<?php
    $email = $_GET['email'];
    $flag = 0;
    $news = 0;
    $promo = 0;

    if(isset($_GET['noticia'])){
        $flag = 1;
        $news = 1;
    }

    if(isset($_GET['promocao'])){
        $flag = 1;
        $promo = 1;
    }

    if(!$flag)
        echo "Assinatura recusada!";
    else{
        echo "Email: " . $email . "<br>";
        echo "Serviços: <br>";
        if($news)
            echo "> Recebimento de notícias. <br>";
        if($promo)
            echo "> Recebimento de promoções. <br>";
    }



?>