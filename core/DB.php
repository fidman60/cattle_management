<?php

class DB {
    protected static $_instance = NULL;
    protected static $_lastInsertId=null;
    protected $_pdo,$_query,$_error = false,$_result,$_count=0;

    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',DB_USER,DB_PASS);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->_pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function getPDO(){
        return $this->_pdo;
    }

    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new DB();
        }


        return self::$_instance;
    }

    public function query($sql,$params = []){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x,$param,PDO::PARAM_INT);
                    $x++;
                }
            }
            if($this->_query->execute()){
                if(preg_match('/SELECT/i',$sql))
                    $this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
                DB::$_lastInsertId = $this->_pdo->lastInsertId();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function insert($table,$fields=[]){
        $fieldString = '';
        $valueString = '';
        $values = [];

        foreach($fields as $field => $value){
            $fieldString .= ("`" . $field . "`,");
            $valueString .= ("?,");
            $values[] = $value;
        }

        $fieldString = rtrim($fieldString,',');
        $valueString = rtrim($valueString,',');

        $sql = "INSERT INTO ".$table." (".$fieldString.")"." VALUES (".$valueString.")";


        if(!$this->query($sql,$values)->error()){
            return true;
        }

        return false;
    }

    public function update($table,$id,$fields=[]){
        $fieldString = '';
        $values = [];

        foreach($fields as $field => $value){
            $fieldString .= (" `" . $field . "`" . "=?,");
            $values[] = $value;
        }

        $fieldString = rtrim($fieldString,",");

        $sql = "UPDATE {$table} SET {$fieldString}  WHERE id={$id}";


        if(!$this->query($sql,$values)->error()){
            return true;
        }

        return false;
    }


    public function delete($table,$id){
        $sql = "DELETE FROM " . $table . " WHERE id=?";
        $values[] = $id;
        if(!$this->query($sql,$values)->error()){
            return true;
        }
        return false;
    }


    public function first(){
        return $this->_result[0];
    }

    public function count(){
        return $this->_count;
    }

    public static function lastInsertId(){
        return DB::$_lastInsertId;
    }


    public function results(){
        return $this->_result;
    }

    public function error(){
        return $this->_error;
    }
}