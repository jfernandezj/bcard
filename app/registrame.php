<?php

/*
 * Copyright 2014 Jonathan Fernández jonathan.fernandezj@gmail.com.
 *
 */

include_once 'modelos/registrameModel.php';

$registraModel = new registrameModel;
$p = $_POST;
switch ($_POST["functionname"]) {
    case 'add':
        $registraModel->add($p);
        break;
} 

