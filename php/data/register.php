<?php
require("../connection/db.php");

$nome = filter_input(INPUT_POST, 'nome');
$apelido = filter_input(INPUT_POST, 'apelido');
$email = filter_input(INPUT_POST, 'email');
$foto = $_FILES['picture']['name'];
$senha = filter_input(INPUT_POST, 'senha');
$Confsenha = filter_input(INPUT_POST, 'confsenha');
$status = 1;
$saida = '';
if (empty($nome)) {
    $saida = 'Preencha o campo nome';
} else if (empty($apelido)) {
    $saida = 'Preencha o campo sobre nome';
} else if (empty($email)) {
    $saida = 'Preencha o campo email';
} else if (empty($senha)) {
    $saida = 'Preencha o campo senha';
} else if (empty($senha)) {
    $saida = 'Preencha o campo confirmar senha';
} else if ($Confsenha != $senha) {
    $saida = 'Campo senha e confirmar senha sao diferentes';
} else {
    $dds = $pdo->prepare("SELECT email from users where email = :email");
    $dds->bindValue(":email", $email);
    $dds->execute();
    if ($dds->rowCount() > 0) {
        $saida = 'Usuario ja existente';
    } else {
        // password_verify()
        $cmd = $pdo->prepare("INSERT INTO users (nome,email,apelido,senha,foto,status,data_created_system,data_created,data_updated,data_deleted) values (:nome,:email,:apelido,:senha,:foto,:status,NOW(),NOW(),NOW(),NULL)");
        $cmd->bindValue(":nome", $nome);
        $cmd->bindValue(":email", $email);
        $cmd->bindValue(":apelido", $apelido);
        $cmd->bindValue(":senha", $senha);
        $cmd->bindValue(":foto", $foto);
        $cmd->bindValue(":status", $status);
        $cmd->execute();
        
        $dd = $pdo->query("SELECT * FROM `users` ORDER BY `id` DESC  LIMIT 1");
        $dados = $dd->fetch();
        $idUser = $dados['id'];

        $s = $pdo->prepare("INSERT INTO status (iduser,status,data_created,data_updated,data_deleted) values (:id,:sta,NOW(),NOW(),NULL)");
        $s->bindValue(":id", $idUser);
        $s->bindValue(":sta", 0);
        $s->execute();


        if ($cmd->rowCount() > 0) {
            $saida = 'Registado com sucesso';
            move_uploaded_file($_FILES['picture']['tmp_name'], "../../upload/$foto");
        } else {
            $saida = 'Falha ao tentar cadastrar';
        }
    }
}


echo json_encode($saida);
