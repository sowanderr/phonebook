<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.12.15
 * Time: 23:12
 */
$ph = $phone->clearInt($_POST['phonenamber']);
$o = $phone->clearInt($_POST['otdel']);
$f = $phone->clearStr($_POST['fname']);
$fn = $phone->clearStr($_POST['sname']);
$sn = $phone->clearStr($_POST['famil']);
$dol = $phone->clearStr($_POST['dol']);
if(!$phone->saveUser($ph,$o,$f,$fn,$sn,$dol)){
        $errMsg = "ну ептить";
    }else {
    $errMsg = 'все ок';
    echo 'qwewqdsax11111111111';
    header('Location: index.php');
}



?>
