<?php

/*
 * Copyright 2014 Jonathan Fernández jonathan.fernandezj@gmail.com.
 *
 */
include_once 'config/database.php';
/**
 * Description of registrame
 *
 * @author Jonathan Fernández jonathan.fernandezj@gmail.com
 */
class registrameModel {
    private $connection;
    
    public function __construct() {
        $this->connection = new database;
    }

    public function add($p) {
        
        $email = $this->connection->sanitize($p['email']);
        $password = $this->connection->sanitize($p['password']);
        $q = "INSERT INTO `bussiness_card`.`base_usuario`
                (`nombre`, `email`,`logapp`,`pwd`,`fecha_creacion`,`fecha_modificacion`,`activo`,`idperfil`)
                VALUES(
                ' ',
                '$email',
                1,
                MD5('$password'),
                now(),
                now(),
                1,
                7);";
        echo $resv =$this->connection->_query($q);
    }

}
