<?php
session_start();
require("../connection/db.php");
$saida = '';

$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "senha");

if(empty($email)){
    $saida = 'Preencha o campo email';
}else if(empty($senha)){
    $saida = 'Preencha o campo senha';
}else{
    $cmd = $pdo->prepare("SELECT id,email,senha,status from users where email = :email and senha = :senha");
    $cmd->bindValue(":email",$email);
    $cmd->bindValue(":senha",$senha);
    $cmd->execute();
    if($cmd->rowCount() > 0){
        $dados = $cmd->fetch();
        if($dados['status'] == 1){
            $_SESSION['admin'] = $dados['id'];
            $cmd = $pdo->query("UPDATE status set status = 1 where iduser = {$_SESSION['admin']} ");
            $saida = 'logado com sucesso';
        }else{
            $saida = 'usuario Bloqueado, contacte o administrador ! email: chestermacoda@gmail.com';
        }
    }else{
        $saida = 'Login invalido, email ou senha incorrecto';
    }
}

// echo json_encode($saida);
echo $saida;