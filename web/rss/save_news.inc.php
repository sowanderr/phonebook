<?php
$t = $news->clearStr($_POST['title']);
$d = $news->clearStr($_POST['description']);
$s = $news->clearStr($_POST['source']);
$c = $news->clearInt($_POST['category']);
if(empty($t) or empty($d)){
    $errMsg = 'Заполни поля!';
}else{
if(!$news->saveNews($t, $c, $d, $s)){
    $errMsg = 'ну ёптить';
}else{
    //echo 'ok';
    //echo $t, $d, $s, $c;
    header('Location: news.php');
    exit;
}}

?>