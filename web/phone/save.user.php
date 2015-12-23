<?php

$ph = $phone->clearInt($_POST['phonenamber']);
$o = $phone->clearInt($_POST['otdel']);
$f = $phone->clearStr($_POST['fname']);
$fn = $phone->clearStr($_POST['sname']);
$sn = $phone->clearStr($_POST['famil']);
$dol = $phone->clearStr($_POST['dol']);
if(!$phone->saveUser($ph,$o,$f,$fn,$sn,$dol)){
        $errMsg = "Запись прошла успешно, Ваш клик очень важен для нас, остовайтесь на линии";
    }else {
    $errMsg = 'Видимо что то случилось';
    }
header ("Location: index.php");
?>
