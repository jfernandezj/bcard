<?php

include_once 'connect.php';

class database {

    private $bd;
    private $mysqli;

    function __construct() {
//        $this->bd = new connect('127.0.0.1', 'root', 'mysql2014', 'bussiness_card');
        $this->mysqli = new mysqli('127.0.0.1', 'root', 'mysql2014', 'bussiness_card');
    }

    function close() {
        $this->bd->close();
    }

    function sanitize($p) {
//        return $this->bd->real_escape_string($p);
        return $this->mysqli->real_escape_string($p);
    }

    public function _lastID() {
        return $this->_lastID = $this->_sqlLink->insert_id;
    }

    function _query($query) {
//        return $this->bd->query($query, $resultmode);
        return $this->mysqli->query($query);
    }

    function mysqli_fetch_array(mysqli_result $result, $resulttype = 'MYSQLI_BOTH') {
        
    }

}
