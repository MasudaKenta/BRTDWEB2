<?php
require('conexao.php');
session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo "<a href=\"login.php\">Necessário realizar login no sistema!</a>";
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Filmes do usuário e dos amigos, com a quantidade de curtidas
$comando = "SELECT f.id, f.id_usuario, f.nome, f.descricao, f.foto, f.link, f.classificacao, f.nota_usuario,
                   u.nome AS autor,
                   (SELECT COUNT(*) FROM curtidas AS c WHERE c.id_filme = f.id) AS total_curtidas,
                   (SELECT COUNT(*) FROM curtidas AS c WHERE c.id_filme = f.id AND c.id_usuario = :usuario1) AS curtiu
            FROM filmes AS f
            INNER JOIN usuarios AS u ON u.id = f.id_usuario
            WHERE f.id_usuario = :usuario2
               OR f.id_usuario IN (SELECT id_amigo FROM amigos WHERE id_usuario = :usuario3)
            ORDER BY f.id DESC";
$stm = $conexao->prepare($comando);
$stm->execute([
    ':usuario1' => $id_usuario,
    ':usuario2' => $id_usuario,
    ':usuario3' => $id_usuario
]);

// Comentários de um filme
$stmComentarios = $conexao->prepare(
    "SELECT c.comentario, u.nome
     FROM comentarios AS c
     INNER JOIN usuarios AS u ON u.id = c.id_usuario
     WHERE c.id_filme = :filme
     ORDER BY c.id ASC"
);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
</head>
<body>
    <h2>Filmes</h2>
    <a href="filme.php">Cadastrar filme</a> |
    <a href="amigos.php">Amigos</a> |
    <a href="sair.php">Sair</a>
    <hr>

<?php
$achou = false;
while ($filme = $stm->fetch(PDO::FETCH_ASSOC)) {
    $achou = true;
    $autor = ($filme['id_usuario'] == $id_usuario) ? 'Você' : $filme['autor'];
    $textoCurtir = $filme['curtiu'] ? 'Descurtir' : 'Curtir';

    echo "<h3>" . htmlspecialchars($filme['nome']) . "</h3>";
    echo "<p>Cadastrado por: " . htmlspecialchars($autor) . "</p>";
    if (!empty($filme['foto'])) {
        echo "<img src=\"" . htmlspecialchars($filme['foto']) . "\" width=\"150\"><br>";
    }
    echo "<p>" . htmlspecialchars($filme['descricao']) . "</p>";
    echo "<p>Classificação: " . (int) $filme['classificacao'] . " | Nota: " . (int) $filme['nota_usuario'] . "</p>";
    if (!empty($filme['link'])) {
        echo "<p><a href=\"" . htmlspecialchars($filme['link']) . "\" target=\"_blank\">Link</a></p>";
    }

    // Curtidas
    echo "<p><strong>Curtidas: " . (int) $filme['total_curtidas'] . "</strong> ";
    echo "<a href=\"curtir_filme.php?id_filme={$filme['id']}\">$textoCurtir</a></p>";

    // Comentários
    echo "<h4>Comentários</h4>";
    $stmComentarios->execute([':filme' => $filme['id']]);
    $temComentario = false;
    while ($comentario = $stmComentarios->fetch(PDO::FETCH_ASSOC)) {
        $temComentario = true;
        echo "<p><strong>" . htmlspecialchars($comentario['nome']) . "</strong>: "
            . htmlspecialchars($comentario['comentario']) . "</p>";
    }
    if (!$temComentario) {
        echo "<p>Nenhum comentário ainda.</p>";
    }

    // Formulário de comentário
    echo "<form action=\"comentar_filme.php\" method=\"post\">";
    echo "<input type=\"hidden\" name=\"id_filme\" value=\"{$filme['id']}\">";
    echo "<input type=\"text\" name=\"texto\" maxlength=\"300\" placeholder=\"Escreva um comentário\" required> ";
    echo "<input type=\"submit\" value=\"Comentar\">";
    echo "</form>";
    echo "<hr>";
}

if (!$achou) {
    echo "<p>Nenhum filme para mostrar. Cadastre um filme ou adicione amigos!</p>";
}
?>
</body>
</html>
