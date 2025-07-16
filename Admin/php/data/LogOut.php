<?php
require_once("../../../php/connection/db.php");
session_start();

if(isset($_SESSION['admin'])){
    $cmd = $pdo->query("UPDATE status set status = 0 where iduser = {$_SESSION['admin']} ");
    unset($_SESSION['admin']);
    header("location: ../../../index.php");
}
 

?> 