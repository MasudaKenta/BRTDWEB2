<style>
    .btn-acao {
        display: inline-block;
        padding: 2px 5px;
        background-color: #d2105a;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }
    .btn-filtro {
        display: inline-block;
        padding: 2px 8px;
        background-color: #d8e0da;
        color: #000000;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }
    .btn-filtro.ativo {
        background-color: #d2105a;
        color: #ffffff;
    }
</style>

<?php
    require('conexao.php');
    session_start();

    // Somente gerente pode acessar
    if(!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 3) {
        echo "Acesso negado!" . "<br>";
        echo "<a href=\"login.php\">Logar</a>";
        exit;
    }

    echo "Olá, <strong>{$_SESSION['nome_usuario']}</strong>!" . '<br>';

    echo "<h2>Todas as entregas</h2>";

    // Filtro por status
    $filtro = isset($_GET['status']) ? $_GET['status'] : '';

    echo "<strong>Filtrar por status:</strong> ";
    echo "<a class='btn-filtro" . ($filtro == '' ? " ativo" : "") . "' href='gerente.php'>Todas</a> ";

    $sql_status = "SELECT id, des_status FROM tab_status_entrega";

    $stm_status = $conexao->prepare($sql_status);
    $stm_status->execute();

    while($st = $stm_status->fetch(PDO::FETCH_ASSOC)){
        echo "<a class='btn-filtro" . ($filtro == $st['id'] ? " ativo" : "") . "' href='gerente.php?status=" . $st['id'] . "'>" . $st['des_status'] . "</a> ";
    }

    echo "<br><br>";

    $sql = "SELECT te.id, te.largura, te.altura, te.profundidade, te.sensivel, te.peso, te.status,
                   tse.des_status, tc.nome AS consumidor, ten.nome AS entregador
            FROM tab_entrega AS te
            INNER JOIN tab_status_entrega AS tse
                ON tse.id = te.status
            INNER JOIN tab_usuario AS tc
                ON tc.id = te.id_consumidor
            LEFT JOIN tab_usuario AS ten
                ON ten.id = te.id_entregador";

    if($filtro != '') {
        $sql .= " WHERE te.status = '$filtro'";
    }

    $stm = $conexao->prepare($sql);
    $stm->execute();

    $total = 0;

    while($res = $stm->fetch(PDO::FETCH_ASSOC)){
        $total++;

        echo "ID_ENTREGA: " . $res['id'] . "<br>"
            . " | STATUS: " . $res['des_status'] . "<br>"
            . " | CONSUMIDOR: " . $res['consumidor'] . "<br>"
            . " | ENTREGADOR: " . ($res['entregador'] ? $res['entregador'] : "Aguardando entregador") . "<br>"
            . " | DIMENSÕES: " . $res['largura'] . " x " . $res['altura'] . " x " . $res['profundidade'] . "<br>"
            . " | PESO: " . $res['peso'] . "<br>"
            . " | " . ($res['sensivel'] ? "<span style='color: red; background-color: #ffe0e0; font-weight: bold; padding: 2px 6px; border-radius: 4px;'>SENSÍVEL</span>" : "<span style='background-color: #d8e0da; font-weight: bold; padding: 2px 6px; border-radius: 4px;'>NÃO SENSÍVEL</span>") . "<br>";

        // Só é possível cancelar entregas que não foram entregues nem canceladas (3 = entregue, 4 = cancelada)
        if($res['status'] != 3 && $res['status'] != 4) {
            echo " <a class='btn-acao' href='cancelar_entrega.php?id=" . $res['id'] . "' onclick=\"return confirm('Cancelar a entrega " . $res['id'] . "?');\">Cancelar</a>";
        }

        echo " <a class='btn-acao' href='excluir_entrega.php?id=" . $res['id'] . "' onclick=\"return confirm('Excluir a entrega " . $res['id'] . "?');\">Excluir</a>"
            . "<br><br>";
    }

    if($total == 0) {
        echo "Nenhuma entrega encontrada." . "<br>";
    }

    echo "<br><br><a href=\"sair.php\">Sair</a>";
?>
