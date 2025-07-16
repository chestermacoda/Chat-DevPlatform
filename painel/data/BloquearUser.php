<?php
require_once("../../php/connection/db.php");


$saida = '';


if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $cmd = $pdo->query("UPDATE users set status = 0 , data_updated = NOW() , data_deleted = NOW() where id = {$id}");
     if($cmd->rowCount() > 0){
         $saida .= '<button class="alert alert-primary text-center row">Bloqueado com sucesso</button>';
    }else{
        $saida .= 'Falha ao tentar Bloquear';
    }


    echo $saida;
}
