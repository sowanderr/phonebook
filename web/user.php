<?php
function __autoload($name){
    include $name.".class.php";
}

$user1 = new User('Jhon','j1','123');
$user1->showInfo();
$user2 = new User('Jhonн','jasd1','1as23');
$user2->showInfo();
$super1 = new SuperUser('supeadmin', 's1','123','god');
$super1->getInfo();
if($super1 instanceof User)
 {
    echo $super1->name . ' человек<hr>';
 }
echo '<br>';
echo "всего юзеров " . User::$howu;
echo "<br>всего супер юзеров" . SuperUser::$hows;
?>