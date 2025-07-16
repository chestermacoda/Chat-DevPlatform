<?php
require_once("../../php/connection/db.php");


$cmd = $pdo->query("SELECT COUNT(con.id) as number,us.nome FROM `conversation` con INNER JOIN  users us ON con.id = us.id GROUP BY con.idAdmin;");
$dados = $cmd->fetchAll();



echo json_encode($dados);
?>