<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 13.12.15
 * Time: 20:48
 */
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
?>

