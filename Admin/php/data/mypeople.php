<?php
session_start();
require_once("../../../php/connection/db.php");
$saida = '';
$admin = $_SESSION['admin'];

$cmd = $pdo->prepare("SELECT us.id,us.nome,us.foto,us.email,cn.conversatio  FROM 
conversation AS cn  
INNER JOIN users AS us  ON 
(us.id = cn.idAdmin) OR 
(us.id = cn.iduser) WHERE 
idAdmin = {$admin} or 
idUser = {$admin} GROUP BY nome ");
// $cmd->bindValue(":admin", $admin);
// $cmd->bindValue(":admin", $admin);
$cmd->execute();

if ($cmd->rowCount() > 0) {
    $dados = $cmd->fetchAll(PDO::FETCH_CLASS);
    // $saida = var_dump($dados);
    foreach( $dados as  $dss){
        if($admin != $dss->id){
            $saida .= '
            <div class="firstuser" data-value="'.$dss->id.'">
                <div class="pictures">
                    <img src="../upload/'.$dss->foto.'" alt="">
                </div>
                <div class="showconversation">
                    <p class="name-personal">'.$dss->nome.'</p>
                    <p class="name">'.$dss->conversatio     .   '</p>
                </div>
                <div class="datanumber d-none">
                    <span class="numberquantity">0</span>
                    <p class="dataweekend">Today</p>
                    <p class="dataweekend d-none">Yesterday</p>
                </div>
            </div>
            ';
        }
        // else 
        // if($admin == $dss->idUser){
        //     $saida .= '
        //     <div class="firstuser" data-value="'.$dss->idAdmin.'">
        //         <div class="pictures">
        //             <img src="../upload/'.$dss->foto.'" alt="">
        //         </div>
        //         <div class="showconversation">
        //             <p class="name-personal">'.$dss->nome.'</p>
        //             <p class="name">Lorem ipsum dolorasdasdas sit</p>
        //         </div>
        //         <div class="datanumber">
        //             <span class="numberquantity none">1</span>
        //             <p class="dataweekend">Yesterday</p>
        //             <p class="dataweekend d-none">Yesterday</p>
        //         </div>
        //     </div>
        //     '; 
        // }
    }
} else {
    $saida = 'Comece uma conversa <button class="btn usuarios "><i class="fa-solid fa-user img"></i></button>';
}


echo $saida;
