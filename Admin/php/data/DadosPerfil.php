<?php
session_start();
require_once("../../../php/connection/db.php");
$saida = '';

if (!empty($_POST['id'])) {
    $usuarios = $_POST['id'];
    $cmds = $pdo->query("SELECT * FROM users where id = {$usuarios}  ");
    $dado = $cmds->fetch();

    if ($_SESSION['admin'] == $dado['id']) {
        $saida .= '
        <button class="btn btn-closes"><i class="fa-solid fa-close"></i></button>
        <div class="perfils-imgs">
            <img src="../upload/' . $dado['foto'] . '" alt="" class="imgs-perfils  ">
        </div>
        <div class="dados-users">
            <div class="cols-dados">
                <p><span class="fw-bold">Nome</span> <span>' . $dado['nome'] . ' ' . $dado['apelido'] . '</span></p>
                <p><span class="fw-bold">E-mail</span><span>'.$dado['email'] . '</span></p>
                <p><span class="fw-bold">Data Created</span><span>'.$dado['data_created'] . '</span></p>
                <p>Admin</p>
            </div>
        </div>
    ';
    } else {
        $saida .= '
        <button class="btn btn-closes"><i class="fa-solid fa-close"></i></button>
        <div class="perfils-imgs">
            <img src="../upload/' . $dado['foto'] . '" alt="" class="imgs-perfils  ">
        </div>
        <div class="dados-users">
            <div class="cols-dados">
                <p><span class="fw-bold">Nome</span> <span>' . $dado['nome'] . ' ' . $dado['apelido'] . '</span></p>
                <p><span class="fw-bold">E-mail</span><span>'.$dado['email'] . '</span></p>
                <p><span class="fw-bold">Data Created</span><span>'.$dado['data_created'] . '</span></p>
                
                <div class="denuncia">
                    <button class="btn btn-sm btn-info btn-denuniar  show">Denuncia</button>
                </div>
                <form action="" class="form-denunciar">
                    <div class="col">
                    <label class="form-label fw-bold">Descreva a denuncia</label>
                    </col>
                    <div class="col">

                        <textarea name="" id="" cols="4" rows="4" class="form-control my-2"></textarea>
                    </div>
                    <div class="col">
                        <input type="submit" value="Enviar" class="btn btn-sm btn-primary px-3 py-1">
                    </div>
                </form>
                    
            </div>
        </div>
        
    ';
    }
}
echo $saida;
