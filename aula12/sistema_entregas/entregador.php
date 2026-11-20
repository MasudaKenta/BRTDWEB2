<style>
    .btn-finalizar {
        display: inline-block;
        padding: 2px 5px;
        background-color: #d2105a;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }
    .btn-finalizar .texto-hover { display: none; }
    .btn-finalizar:hover .texto-normal { display: none; }
    .btn-finalizar:hover .texto-hover { display: inline; }
</style>

<?php
    require('conexao.php');
    session_start();

    echo "Olá, <strong>{$_SESSION['nome_usuario']}</strong>!" . '<br>';
    


    echo "<h2>Entregas disponíveis</h2>";

    $sql = "SELECT te.id, te.largura, te.altura, te.profundidade, te.sensivel, te.peso, tse.des_status 
            FROM tab_entrega AS te 
            INNER JOIN tab_status_entrega AS tse 
            ON tse.id = te.status
            WHERE te.status = '1'";

    $stm = $conexao->prepare($sql);
    $stm->execute();

    while($res = $stm->fetch(PDO::FETCH_ASSOC)){
        echo "ID_ENTREGA: " . $res['id'] . "<br>" 
            . " <a href='aceitar_entrega.php?id=" . $res['id'] . "' style='display: inline-block; padding: 2px 5px; background-color: #d2105a; color: #ffffff; text-decoration: none; border-radius: 4px; font-size: 14px; cursor: pointer;'>Aceitar Entrega</a>" . "<br>"
            . " | STATUS: " . $res['des_status'] . "<br>" 
            . " | DIMENSÕES: " . $res['largura'] . " x " . $res['altura'] . " x " . $res['profundidade'] . "<br>" 
            . " | PESO: " . $res['peso'] . "<br>" 
            . " | " . ($res['sensivel'] ? "<span style='color: red; background-color: #ffe0e0; font-weight: bold; padding: 2px 6px; border-radius: 4px;'>SENSÍVEL</span>" : "<span style='background-color: #d8e0da; font-weight: bold; padding: 2px 6px; border-radius: 4px;'>NÃO SENSÍVEL</span>") . "<br>"
            .  "<br>";
    }

    $sql2 = "SELECT te.id, te.largura, te.altura, te.profundidade, te.sensivel, te.peso, tse.des_status 
            FROM tab_entrega AS te 
            INNER JOIN tab_status_entrega AS tse 
            ON tse.id = te.status
            WHERE te.id_entregador = {$_SESSION['id_usuario']}";

    $stm2 = $conexao->prepare($sql2);
    $stm2->execute();

    echo "<h2>Minhas Entregas</h2>";

    while($res2 = $stm2->fetch(PDO::FETCH_ASSOC)){
        if ($res2['des_status'] == "entregue") {
            echo "ID_ENTREGA: " . $res2['id'] . "<br>"
                . " <span class='btn-finalizar sem-hover'>" . $res2['des_status'] . "</span><br>";
        } else {
            echo "ID_ENTREGA: " . $res2['id'] . "<br>"
                . " <a class='btn-finalizar' href='finalizar_entrega.php?id=" . $res2['id'] . "'>"
                . "<span class='texto-normal'>" . $res2['des_status'] . "</span>"
                . "<span class='texto-hover'>Clique para concluir</span></a><br>";
        }

    }

    echo "<br><br><a href=\"sair.php\">Sair</a>";
?>


