<?php
session_start();
require_once("../../../php/connection/db.php");
$saida = '';

if(!empty($_POST['iduser'])){
    $usuarios = $_POST['iduser'];
    $cmd = $pdo->prepare("SELECT * FROM users where id = {$usuarios} ");
    $cmd->execute();
    
    if($cmd->rowCount() > 0){
        $dados = $cmd->fetch();
        
        $cmds = $pdo->query("SELECT * FROM status where iduser = {$usuarios}  ");
        $dado = $cmds->fetch();
        if($dado['status'] === 0){
            $saida .= '
        
            <div class="picture-people  ">
                <img src="../upload/'.$dados['foto'].'" alt="" class="datas-check" data-id="'.$dados['id'].'">
                </div>
                <div class="people-name">
                <p class="namepeople">'.$dados['nome'].'</p>
                <p class="written">offline</p>
            </div>
        
            ';
        }else{
            $saida .= '
        
            <div class="picture-people ">
                <img src="../upload/'.$dados['foto'].'" alt="" class="datas-check" data-id="'.$dados['id'].'">
                </div>
                <div class="people-name">
                <p class="namepeople">'.$dados['nome'].'</p>
                <p class="written">Online</p>
            </div>
        
            ';
    
        }
    
    
    
    } 
}else{

    
    
}

echo $saida;