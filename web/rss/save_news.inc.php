<?php
$t = $news->clearStr($_POST['title']);
$d = ($news->clearStr($_POST['description']));
$s = $news->clearStr($_POST['source']);
$c = $news->clearInt($_POST['category']);
if (empty($t) or empty($d)) {
    $errMsg = 'Заполни сука поля!';
}else{
$news->saveNews($t, $d, $s, $c);
  echo 'ok';
    echo $t, $d, $s, $c;
    //header('Location: news.php');

    }
?>