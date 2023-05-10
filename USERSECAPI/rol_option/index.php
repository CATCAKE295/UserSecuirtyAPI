<?php
require_once "./model/Read.php";
require_once "./model/Create.php";
require_once "./model/Update.php";
require_once "./model/Delete.php";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if (isset($_GET['id_rol_option'])) {
            echo json_encode(Read::showbyid($_GET['id_rol_option']));
        } else {
            echo json_encode(Read::show());
        }
        break; 
    
}

?>