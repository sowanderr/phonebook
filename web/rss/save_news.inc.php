<?php
$t = $news->clearStr($_POST['title']);
$d = $news->clearStr($_POST['description']);
$s = $news->clearStr($_POST['source']);
$c = $news->clearInt($_POST['category']);
if(empty($t) or empty($d)) {
    $errMsg = 'Заполни поля!';
}else{
//$news->saveNews($t, $c, $d, $s);
    if($news->saveNews($t, $c, $d, $s==false)){
        $errMsg = 'ну ёптить';
    }else {
        //$errMsg = 'ну ёптить';
        //echo 'ok';
        //echo $t, $d, $s, $c;
        header('Location: news.php');
        exit;
    }
}

?>