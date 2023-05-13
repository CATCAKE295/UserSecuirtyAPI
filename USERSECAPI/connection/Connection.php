<?php 

class Connection extends Mysqli {

    function __construct(){

    parent::__construct('localhost','codesociety_uca','Temporal2023+','codesociety_uca_user');

    $this->set_charset('utf8mb4');
    $this->connect_error == NULL ? 'Conexión exitosa a la BD!!' : die('Error al conectarse');
    }

    
}

?>