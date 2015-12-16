<?php
$id = $news->clearInt($_GET['del']);
if($id){
    if(!$news->deleteNews($id)){
        $errMsg = "ПРоизошла ошибка, удаления записи.";
    }else{
        header('Location: news.php');
        exit;
    }
}
?>