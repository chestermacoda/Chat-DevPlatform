<?php
require_once("../../php/connection/db.php");


$saida = '';


if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $cmd = $pdo->query("UPDATE users set status = 1 , data_updated = NOW() , data_deleted = NULL where id = {$id}");
     if($cmd->rowCount() > 0){
         $saida .= 'Bloqueado com sucesso';
    }else{
        $saida .= 'Falha ao tentar Bloquear';
    }


    echo $saida;
}
