<?php
session_start();
require_once("../php/connection/db.php");
if(!isset($_SESSION['admin'])){
    header('location: ../index.php');
}

$usuarios = $_SESSION['admin'];
$cmd = $pdo->query("SELECT * FROM users where id = {$usuarios}");
$dados = $cmd->fetch();
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat </title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/all.css">
</head>
 
<body>
    <div class="container-fluid">
        <section class="painel-left">
            <div class="allchat">
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
            <div class="navs">
                <ul>
                    <li class="ative"><a href="#"><i class="fa-regular fa-comment"></i></a></li>
                    <li><a href="#"><i class="fa-regular fa-user"></i></a></li>
                    <li><a href="#"><i class="fa-regular fa-star"></i></a></li>
                    <li><a href="../painel/index.php" class="<?= $_SESSION['admin'] != 1 ? 'd-none' : ''?>"><i class="fa-solid fa-box"></i></a></li>
                </ul>
            </div>
            <div class="users">
                <a href="php/data/LogOut.php" class="btn"><i class="fa-solid fa-sign-out"></i></a>
                <button class="btn"><img src="../upload/<?=$dados['foto']?>" alt="" class="img datas-check" data-id="<?=$dados['id']?>"></button>
            </div>
        </section>
        <header class="head">
            <div class="logo-add">
                <div class="logo">
                    <img src="../public/images/logolmpo.png" alt="">
                </div>
                <div class="add">
                    <button class="btn usuarios"><i class="fa-solid fa-users"></i></button>
                    <button class="btn "><i class="fa-solid fa-add"></i></button>
                </div>
            </div>
            <form action="" class="form-groups">
                <div class="rows">
                    <input type="text" name="" id="" class="form-control rounded-0" placeholder="Search chats">
                </div>
            </form>
            <nav class="chats">
                <div class="allusers">
                    <!-- Pessoas adicionadas para conversar -->
                </div>
            </nav>
        </header>
        <main class="main">
            <div class="nav-top">
                <div class="other-user">
                    <!-- <div class="picture-people">
                        <img src="../public/images/foto1.png" alt="">
                    </div>
                    <div class="people-name">
                        <p class="namepeople">Rosalina</p>
                        <p class="written">writting...</p>
                    </div> -->
                </div>
                <div class="allcommunication">
                    <button class="btn"><i class="fa-solid fa-phone"></i></button>
                    <button class="btn"><i class="fa-solid fa-video"></i></button>
                </div>
            </div>
            <div class="conversation">
                <!-- CONVERSATION INICIADAS -->
            </div>
            <form action="" class="sendMessages">
                <div class="rows">
                    <button class="btn"><i class="fa-solid fa-user"></i></button>
                    <input type="text" name="message" id="message" class="form-control rounded-0" placeholder="Writte a message.">
                    <button class="btn submit"><i class="fa-regular fa-paper-plane"></i></button>
                    <button class="btn"><i class="fa-solid fa-trash"></i></button>
                </div>
            </form>
        </main>
        <div class="mains">
        </div>
        <input type="hidden" name="" id="users" value="">
    </div>
    <script>
        const admin = '<?php echo $admin =  $_SESSION['admin']; ?>'
    </script>

    <script src="../public/js/bootstrap.bundle.js"></script>
    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/script.js"></script>

    
</html>