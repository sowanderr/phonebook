<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.12.15
 * Time: 0:03
 */
$result = $phone->getUser();
if(!is_array($result)){
    $errMsg = "Ошибка вышла";

}else{
    echo '<p>Всего юзеров: '.count($result);
    foreach($result as $item){
        $id = $item['id'];
        $fname=$item['fname'];
        $sname=$item['sname'];
        $famil=$item['famil'];
        $phonenamber = $item['phonenamber'];
        $otdel=nl2br($item['otdel']);
        $dol=$item['dol'];
        $dt= date('d-m-Y H:i:s', $item['datetime']);
        echo <<<HTML_ENTITIES
<hr>
<h3>$sname, $famil, $fname<h3>
<h2>$phonenamber</2h>
<br>[$otdel] @ $dt</p>
<p align = 'right'>
<a href='news.php?del=$id'>удалить</a>
</p>
HTML_ENTITIES;
}
}
?>