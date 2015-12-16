<?php
require 'INewsDB.class.php';
class NewsDB implements INewsDB{

    protected $_db;
    const DB_NAME = __DIR__ ."/news.db";

    function __construct()
    {
        if (file_exists(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);}
        else{
        $this->_db = new SQLite3(self::DB_NAME);
         $sql = "CREATE TABLE msgs(
	            id INTEGER PRIMARY KEY AUTOINCREMENT,
            	title TEXT,
	            category INTEGER,
	            description TEXT,
	            source TEXT,
	            datetime INTEGER)";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "CREATE TABLE category(
	                id INTEGER,
	                name TEXT)";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            $sql = "INSERT INTO category(id, name)
                    SELECT 1 as id, 'Политика' as name
                    UNION SELECT 2 as id, 'Культура' as name
                    UNION SELECT 3 as id, 'Спорт' as name ";
            $this->_db->exec($sql) or die($this->_db->lastErrorMsg());
            }

    }
    function __destruct()
    {
        unset($this->_db);
    }
    function clearStr($data){
        $data = trim(strip_tags($data));
        return $this->_db->escapeString($data);
    }
    function clearInt($data){
        return abs((int)$data);
    }
    function saveNews($t, $c, $d, $s){
        try{
        $dt = time();
        $sql = "INSERT INTO msgs(title, category, description, source, datetime)
VALUES('$t', '$c', '$d', '$s', $dt)";
        $res = $this->_db->exec($sql);
        if(!$res){
            throw new Exception($this->_db->lastErrorMsg());
            return true;
        }
        }catch(Exception $e){
            //,k,kfbla
            return false;
        }
        }
    protected function db2Arr($data){
        $arr =array();
        while($row = $data->fetchArray(SQLITE3_ASSOC))
            $arr[] = $row;
        return $arr;
    }
	function getNews(){
        try {
            $sql = "SELECT msgs.id as id, title, category.name as category, description,
            source, datetime
                FROM msgs, category
                WHERE category.id=msgs.category
                ORDER BY msgs.id DESC";
            $res = $this->_db->query($sql);
            if(!is_object($res))
                throw new Exception($this->_db->lastErrorMsg());
            return $this->db2Arr($res);
            }catch(Exception $e){
            //,kfблабла маил ерор
            return false;
        }
        }

	function deleteNews($id){
        try {
            $sql = "DELETE FROM msgs WHERE id=$id";
            $res = $this->_db->exec($sql);
            if(!$res){
                throw new Exception($this->_db->lastErrorMsg());
            }
                return true;
        }catch(Exception $e){
            //шлем $e на почту
            return false;
        }                                //or die ($this->_db->lastErrorMsg());
    }
    public function showcon(){
        echo self::DB_NAME;
    }
}

?>