<?php
    $nome_tmp = $_FILES["foto"]["tmp_name"];
    $nome = $_FILES["foto"]["name"];
    $destino = "imagens/" . $nome;

    $nome_receita = $_POST["nome"];
    $ingredientes = $_POST["ingredientes"];
    $preparo = $_POST["preparo"];

    $res = move_uploaded_file($nome_tmp, $destino);

    $file = fopen("receitas.md", "a");


    fwrite($file, "<strong>$nome_receita</strong>\n");
    fwrite($file, "$destino\n\n");
    fwrite($file, "<strong>Ingredientes</strong>\n$ingredientes\n\n");
    fwrite($file, "<strong>Modo de Preparo</strong>\n$preparo\n\n");

    fclose($file);

    echo "Receita e foto armazenados com sucesso!";
?>

<a href="ex1_exibir.php" target="_blank">Verificar receita</a>