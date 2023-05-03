<?php 

require_once "model/Rol.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id_rol'])) {
            echo json_encode(Rol::getWhere($_GET['id_rol']));
        } else {
            echo json_encode(Rol::getAll());
        }
        break;
    
    default:
        # code...
        break;
}


?>