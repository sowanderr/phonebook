<?php
require 'IN.class.php';
class phoneNumber implements IN{
    protected $_db;
    const DB_NAME = __DIR__ . "/phone.db";

    function __construct()
    {
        if (file_exists(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);
        } else {
            $this->_db = new SQLite3(self::DB_NAME);
            $sql = "CREATE TABLE msgs(
	            id INTEGER PRIMARY KEY AUTOINCREMENT,
            	fname TEXT,
            	sname TEXT,
            	famil TEXT,
	            otdel INTEGER,
	            phonenamber INTEGER,
	            dol TEXT,
	            datetime INTEGER)";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "CREATE TABLE otdel(
	                id INTEGER,
	                name TEXT)";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "INSERT INTO otdel(id, name)
                    SELECT 1 as id, 'ОАСУиС' as name
                    UNION SELECT 2 as id, 'УПР' as name
                    UNION SELECT 3 as id, 'УРЗ' as name ";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
        }
    }
    function __destruct()
    {
     unset($this->_db);   // TODO: Implement __destruct() method.
        echo "ЗААНСЕТИЛ";
        echo self::DB_NAME;
    }
    function clearStr($data){
        $data = trim(strip_tags($data));
        $data = $this->mb_ucfirst($data);
        return $this->_db->escapeString($data);
    }
    function clearInt($data){
        return abs((int)$data);
    }
    function saveUser($ph,$o,$f,$fn,$sn,$dol)
    {
        $dt = time();
        $sql = "INSERT INTO msgs(phonenamber, otdel, famil, fname, sname, dol, datetime)
VALUES('$ph','$o','$f','$fn','$sn','$dol','$dt')";
        $this->_db->exec($sql) or die($this->_db->lastErrorMsg());

    }
    function getUser()
    {
        try{
        $sql = "SELECT msgs.id as id, fname, sname, famil, otdel.name as otdel, phonenamber, dol, datetime
         FROM msgs, otdel
         WHERE otdel.id=msgs.otdel
         ORDER BY msgs.id DESC";
        $res = $this->_db->query($sql);
        if (!is_object($res))
            throw new Exception($this->_db->lastErrorMsg());
        return $this->db2Arr($res);
    }catch(Exception $e){
            return false;
        }
    }
    //Первая буква Верхний регистр
    function mb_ucfirst($text) {
        mb_internal_encoding("UTF-8");
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }
    function db2Arr($data){
        $arr =array();
        while($row = $data->fetchArray(SQLITE3_ASSOC))
            $arr[] = $row;
        return $arr;
    }
    function deleteUser($id)
    {
        // TODO: Implement deleteUser() method.
    }


}




?>








