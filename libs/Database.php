<?php

class Database {

    private $mysqli;
    private $stmt;

    private $db_url = "localhost";
    private $db_user = "root";
    private $db_pw = "root";
    private $db_db = "blog";



    function __construct() {
        $this->mysqli = new mysqli($this->db_url, $this->db_user, $this->db_pw, $this->db_db);
        if ($this->mysqli->connect_error) {
            throw new Exception("MySQL Connection Failed");
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    function query($sql) {
        $this->stmt = $this->mysqli->prepare($sql);
    }

    function bind($type, ...$var1) {
        //print_r($var1);
        $this->stmt->bind_param($type, ...$var1);
        //$test = array_unshift($var1, $type)
        //$test = array_unshift($this->ref_values($var1), $type)
        //call_user_func_array( array($this->stmt, 'bind_param'), $this->ref_values($test));
    }

    /*private function ref_values($array) {
        $refs = array();
        foreach ($array as $key => $value) {
            $refs[$key] = &$array[$key];
        }
        return $refs;
	}*/

    function execute() {
        return $this->stmt->execute();
    }

    function getInsertID() {
        return $this->mysqli->insert_id;
    }

    function allResults() {
        $this->execute();
        $result = $this->stmt->get_result();
        $res = array();
        while ($data = $result->fetch_assoc()){
            $res[] = $data;
        }
        return $res;
    }

    function singleResult() {
       $this->execute();
       $result = $this->stmt->get_result();
       return $result->fetch_assoc();
    }

}

?>