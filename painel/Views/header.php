<?php
require("../php/connection/db.php");
session_start();

if($_SESSION['admin'] != 1  ){
    header('location: ../Admin/index.php');
}
$usuario = $_SESSION['admin'];
$user =  $pdo->query("SELECT * FROM users where id = {$usuario} ");
$dado = $user->fetch();



$users =  $pdo->query("SELECT * FROM users ");
$usuarios = $users->fetchAll();


$conversa =  $pdo->query("SELECT * FROM conversation ");
$conversation = $conversa->fetchAll();





$u =  $pdo->query("SELECT * FROM users where id != {$usuario} ");
$us = $u->fetchAll();


// People blocked
$blockeds =  $pdo->query("SELECT * FROM users where status = 0 and data_deleted != '' ");
$blocked = $blockeds->fetchAll();



// People Active and status  == 1
$actives =  $pdo->query("SELECT * FROM users where status = 1 limit 10");
$active = $actives->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/all.css">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/chat.css">
</head>

<body>
    <div class="container-fluid">

        <header class="headers">
            <nav class="nav">
                <div class="logo">
                    <a href="#"><img src="../public/images/logolmpo.png" alt=""></a>
                </div>
                <form action="" class="form-group">
                    <div class="rows">
                        <input type="text" name="seach" id="" placeholder="Procurar opcao do menu..." class="form-control">
                        <i class="fa-solid fa-search search"></i>
                    </div>
                </form>
                <ul>
                    <li><a href="index.php" <?= $nav == 'index' ? 'class="active"' : '' ?>><span><i class="fa-solid fa-home"></i></span> Home</a></li>
                    <!-- <li><a href="#"><span><i class="fa-solid fa-calendar-alt"></i></span> Agenda</a></li> -->
                    <li><a href="users.php" <?= $nav == 'user' ? 'class="active"' : '' ?>><span><i class="fa-solid fa-users"></i></span> Pessoas</a></li>
                    <li><a href="bloackeado.php "<?= $nav == 'blocked' ? 'class="active"' : '' ?>><span><i class="fa-solid fa-home" ></i></span> Bloqueados</a></li>
                    <li><a href="report.php" <?= $nav == 'report' ? 'class="active"' : '' ?>><span><i class="fa-solid fa-flag"></i></span> Report Message</a></li>
                    <!-- <li><a href="#"><span><i class="fa-solid fa-cart-shopping"></i></span> Vendas</a></li> -->
                    <!-- <li><a href="#"><span><i class="fa-solid fa-server"></i></span> Estoque</a></li> -->
                    <!-- <li><a href="#"><span><i class="fa-solid fa-dollar"></i></span> Financeiro</a></li> -->
                    <!-- <li><a href="#"><span><i class="fa-solid fa-home"></i></span> Servicos</a></li> -->
                    <!-- <li><a href="#"><span><i class="fa-solid fa-server"></i></span> Utilitarios</a></li> -->
                </ul>
            </nav>
        </header>

        <main class="main">
            <div class="menu-top">
                <div class="menu-hmbr">
                    <button class="btn btn-bars">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <p>Painel</p>
                </div>
                <div class="users">
                    <a href="../Admin/index.php" class="btn btn-users">
                        <p><?=$dado['nome'] ?> <?=$dado['apelido']?></p>
                        <i class="fa fa-user"></i>
                    </a>
                    <button class="btn btn-bells"><i class="fa-solid fa-bell"></i> <span class="number-show">1</span></button>
                </div>
            </div>