<?php
session_start();

$_SESSION["y"] = $_GET["y"];

echo "<a href='sessao3.php'>Verifica Y</a><br>";
echo "<a href='triplo.php'>Triplo</a><br>";
echo "<a href='encerra.php'>Encerra sessão</a>";
?>