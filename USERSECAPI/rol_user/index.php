<?php 

require_once "model/Rol_user_getAll.php";
require_once "model/Rol_user_getWhere.php";
require_once "model/Rol_user_insert.php";
require_once "model/Rol_user_update.php";
require_once "model/Rol_user_delete.php";


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id_rol_user'])) {
            echo json_encode(Rol_user_getWhere::getWhere($_GET['id_rol_user']));
        } else {
            echo json_encode(Rol_user_getAll::getAll());
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos != NULL){
            if(Rol_user_insert::insert($datos->id_rol, $datos->id_user)){
                http_response_code(200);
            }
            else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(405);
        }
        break;

    
    case 'PUT':
        $datos = json_decode(file_get_contents('php://input'));
        if($datos != NULL){
            if(Rol_user_update::update($datos->id_rol_user, $datos->id_rol, $datos->id_user)){
                http_response_code(200);
            }
            else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(405);
        }
        break;


    case 'DELETE':
        if(isset($_GET['id_rol_user'])){
            if(Rol_user_delete::delete($_GET['id_rol_user'])){
                http_response_code(200);
            }
            else{
                http_response_code(400);
            }
        }
        else{
            http_response_code(405);
        }
        break;

         
    default:
        http_response_code(405);
        break;
}



?>