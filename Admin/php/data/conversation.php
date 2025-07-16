<?php
session_start();
require_once("../../../php/connection/db.php");
$saida = '';

if (!empty($_POST['iduser']) && isset($_SESSION['admin'])) {


    $admin = $_SESSION['admin'];
    $user = $_POST['iduser'];
    $_SESSION['user'] = $user;

    $cmd = $pdo->prepare("SELECT * FROM `conversation` 
    LEFT JOIN users ON users.id = conversation.idAdmin 
    WHERE 
    (idAdmin = {$admin} AND idUser = {$user}) OR 
    (idAdmin = {$user} AND idUser = {$admin}) ORDER BY conversation.id");
    $cmd->execute();



    if ($cmd->rowCount() > 0) {
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dados as $dds) {

            if ($dds['idUser'] !=  $user) {
                $saida .= '
            <div class="user2">
                <div class="principalUser">
                    <div class="peopleConversation">
                        <div class="userconversation">
                            <img src="../upload/' . $dds['foto'] . '" alt="">
                        </div>
                        <div class="usercomment">
                            <p class="namesConversation">' . $dds['nome'] . '</p>
                            <p class="namesData">11:05 AM</p>
                        </div>
                    </div>
                    <div class="conversatioParagraf">
                       ' . $dds['conversatio'] . '
                    </div>
                </div>
                <div></div>
            </div>
            ';
            } else {
                $saida .= '
            <div class="user1">
                <div></div>
                <div class="principalUser">
                    <div class="peopleConversation">
                        <div class="userconversation">
                            <img src="../upload/' . $dds['foto'] . '" alt="">
                        </div>
                        <div class="usercomment">
                            <p class="namesConversation">' . $dds['nome'] . '</p>
                            <p class="namesData">11:05 AM</p>
                        </div>
                    </div>
                    <div class="conversatioParagraf">
                        ' . $dds['conversatio'] . '
                    </div>
                </div>
            </div>
            ';
            }
        }
    } else {

        $saida = '<p class="conversationMessage">Nenhuma conversa iniciada -  <button class="btn usuarios ">Comece uma conversa  <i class="fa-solid me-2 fa-user img "></i></button></p>';
    }
} else {

    $saida = '<p class="conversationMessage">Nenhuma conversa iniciada - Comece uma conversa <button class="btn usuarios "><i class="fa-solid fa-user img"></i></button></p>';
}
echo $saida;
