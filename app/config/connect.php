<?php

/*
 * Copyright 2014 Jonathan Fernández jonathan.fernandezj@gmail.com.
 *
 */

/**
 * Description of connect
 *
 * @author Jonathan Fernández jonathan.fernandezj@gmail.com
 */
class connect extends mysqli {

    public function __construct($host, $usuario, $contraseña, $bd) {
        parent::init();

        if (!parent::options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
            die('Falló la configuración de MYSQLI_INIT_COMMAND');
        }

        if (!parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
            die('Falló la configuración de MYSQLI_OPT_CONNECT_TIMEOUT');
        }

        if (!parent::real_connect($host, $usuario, $contraseña, $bd)) {
            die('Error de conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }

    public function real_escape_string($escapestr) {
        return parent::real_escape_string($escapestr);
    }

    public function query($query, $resultmode) {
        return parent::query($query, $resultmode);
    }

}
