<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 18.12.15
 * Time: 19:21
 include213
 */
require 'phoneNumber.class.php';
$phone = new phoneNumber;
$errMsg='';
if($_SERVER['REQUEST_METHOD']==='POST') {
   echo "преквест метод пост работает";
    include 'save.user.php';
}
if($_GET['del']){
    echo 'get del работает';
 $id = $phone->clearInt($_GET['del']);
    $phone->deleteUser($id);
    echo "удалена запись ID $id";
    header ("Location: index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title>Телефонный справочник</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if($errMsg)
    echo "<h3>$errMsg</h3>";
?>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    Номер телефона <br/>
    <input type="text" name="phonenamber" /><br />
    Выберите отдел:<br />
    <select name="otdel">
        <option value="1">ОАСУиС</option>
        <option value="2">УПР</option>
        <option value="3">УРЗ</option>
    </select>
    <br />
    Фамилия <br />
    <input type="text" name="famil" /><br />
    Имя<br />
    <input type="text" name="fname" /><br />
    Отчество<br />
    <input type="text" name="sname" /><br />
    Должность<br />
    <input type="text" name="dol" /><br />

    <input type="submit" method="post" value="Добавить!" />
</form>
<?php
include 'get_user.inc.php';
//var_dump($_SERVER);
//echo $_GET['del'];
//echo $phone->urihref();

?>

</body>
</html>
