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
    
    case 'POST':
        $data = json_decode(file_get_contents('php://input'));

        if ($data != NULL) {

            if (Create::insert($data->id_rol,$data->id_option)) {        
                http_response_code(200);
            } else {
                http_response_code(405);
            }
        } else {

            http_response_code(405);

        }

        break;

    case 'PUT':

        $data = json_decode(file_get_contents('php://input'));
    
         if ($data != NULL) {

            if (Update::update($data->id_rol_option,$data->id_rol,$data->id_option)) {        
                http_response_code(200);
            } else {
                http_response_code(405);
            }

                
        } else {
            http_response_code(405);
        }
        break;
    
    case 'DELETE':
        if (isset($_GET['id_rol_option'])) {
            if (Delete::remove($_GET['id_rol_option'])) {
                http_response_code(200);
            } else {
                http_response_code(400);
            }
        } else {
            http_response_code(405);

        }
        break;
    
}

?>