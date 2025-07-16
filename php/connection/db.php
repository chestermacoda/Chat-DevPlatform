<?php
// include("classes/Cliente.php");
// include_once("Vendas.php");
// Variaveis de conexao a base de dados 
$dbname = 'chat';
$localhost = 'localhost';
$root = 'root';
$senha = ''; 

// Variaveis de conexao a base de dados no servidor
// $dbname = '';
// $localhost = '';
// $root = '';
// $senha = ''; 


// Instancia da Classe Vendas
// $Vendas = new Vendas($dbname,$localhost,$root,$senha);

// Instacia da Classe CLiente
// $Cliente = new Cliente($dbname,$localhost,$root,$senha);

// Conexao a Base de Dados PDO
$pdo = new PDO("mysql:host=".$localhost."; dbname=".$dbname.";",$root,$senha);

// Estocke Minimo
$minimo = 20;




/*
try {
    $pdo = new PDO("mysql:host=".$localhost."; dbname=".$dbname.";",$root,$senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
*/ 



?>