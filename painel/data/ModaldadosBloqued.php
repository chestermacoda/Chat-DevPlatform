<?php
require_once("../../php/connection/db.php");


$saida = '';


if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $cmd = $pdo->query("SELECT * FROM users where id = {$id}");
    $dados = $cmd->fetch();


    $saida .= '


    <table class="table text-center">
        <tr>
            <td class="fw-bold">Nome</td>
            <td>'.$dados['nome'].'</td>
        </tr>
        <tr>
            <td class="fw-bold">Apelido</td>
            <td>'.$dados['apelido'].'</td>
        </tr>
        <tr>
            <td class="fw-bold">E-mail</td>
            <td>'.$dados['email'].'</td>
        </tr>
        <tr>
            <td class="fw-bold">Data created</td>
            <td>'.$dados['data_created'].'</td>
        </tr>
        <tr>
            <td class="fw-bold">Bloquear</td>
            <td><button class="btn btn-sm btn-primary active" data-id="'.$dados['id'].'" >Desbloquear</button></td>
        </tr>
    </table>


';


    echo $saida;
}
