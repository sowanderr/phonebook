<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 13.12.15
 * Time: 20:49
 */
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
?>