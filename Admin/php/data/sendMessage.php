<?php
session_start();
require_once("../../../php/connection/db.php");


$error = array();
$response = '';
$admin =   filter_input(INPUT_POST,'admin');
$users = filter_input(INPUT_POST,'users'); 
$conversation = filter_input(INPUT_POST,'conversation'); 

if(empty($admin)){
    $saida = 'Nenhum usuario encontrado 1';
}else if(empty($users)){
    $saida = 'Nenhum usuario encontrado 2';
}else{


    $cmd = $pdo->prepare("INSERT INTO conversation (idAdmin,idUser,conversatio,data_created_system,data_created,data_updated,data_deleted) values (:admin,:user,:conversa,NOW(),NOW(),NOW(),NULL)");
    $cmd->bindValue(":admin",$admin);
    $cmd->bindValue(":user",$users);
    $cmd->bindValue(":conversa",$conversation);
    // $cmd->bindValue(":identi",$admin.'-'.$users);
    $cmd->execute();
    if($cmd->rowCount() > 0){
        $saida = 'Registado com sucesso';
    }else{
        $saida = 'Falha ao tentar cadastrar';
    }

}


echo $saida;


?>