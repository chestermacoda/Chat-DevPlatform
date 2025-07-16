<?php
session_start();
require_once("../../../php/connection/db.php");
$saida = '';
$admin = $_SESSION['admin'];
$cmd = $pdo->prepare("SELECT * FROM users where id != {$admin}");
$cmd->execute();
if ($cmd->rowCount() > 0) {
    $dados = $cmd->fetchAll(PDO::FETCH_CLASS);
    $idUser = $pdo->lastInsertId();
    foreach( $dados as  $dss){
        
            $saida .= '
            <div class="firstuser" data-value="'.$dss->id.'">
                <div class="pictures">
                    <img src="../upload/'.$dss->foto.'" alt="">
                </div>
                <div class="showconversation">
                    <p class="name-personal">'.$dss->nome.' </p>
                    <p class="name d-none">Lorem ipsum dolorasdasdas sit</p>
                </div>
                <div class="datanumber">
                    <span class="numberquantity d-none">1</span>
                    <p class="dataweekend d-none">Yesterday</p>
                    <p class="dataweekend d-none">Yesterday</p>
                </div>
            </div>
            '; 
        
    }
} else {
    $saida = 'comece uma conversa <button class="btn"><i class="fa-solid fa-user img"></i></button>';
}


echo $saida;
