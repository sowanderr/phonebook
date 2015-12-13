<?php
abstract class AUser {
    abstract function showInfo();
}
interface ISuser {
    function getInfo();
}
class User extends AUser {
public $name;
public $login;
public $password;
public static $howu = 0;
    public function showInfo ()
    {
    echo $this->name . '<br>';
    echo $this->login . '<br>';
    echo $this->password . '<br>';
    }
    function __construct($n,$l,$p)
    {
        $this->name=$n;
        $this->login=$l;
        $this->password=$p;
        ++self::$howu;
    }
    function __destruct()
    {
     echo "удален <br>";
    }
}
class SuperUser extends User implements ISuser {
   public $got;
   public static $hows = 0;
    function __construct($n, $l, $p, $g)
    {
        parent::__construct($n, $l, $p);
        $this->got = $g;
        parent::showInfo();
            ++self::$hows;
            --parent::$howu;
    }
    function getInfo()
    {
            $arr = array();
            foreach ($this as $k=>$v)
                $arr[$k] = $v;
            return $arr;
        //return (array)$this;
        //var_dump($this);                 // TODO: Implement getInfo() method.
    }
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