<?php

require_once "./model/Read.php";
require_once "./model/Create.php";
require_once "./model/Update.php";
require_once "./model/Delete.php";

switch ($_SERVER['REQUEST_METHOD']) {

    case 'GET':
        if (isset($_GET['id_option'])) {
            echo json_encode(Read::getWhere($_GET['id_option']));
        } else {
            echo json_encode(Read::getAll());
        }
        break;

        case 'POST':
            $data = json_decode(file_get_contents('php://input'));
    
            if ($data != NULL) {
                if (Create::insert($data->option)) {
                    http_response_code(200);            
                } else {
                    http_response_code(400); 
                }
                
            } else {
                http_response_code(405);
            }
           
        break;

        case 'PUT': 

            $data = json_decode(file_get_contents('php://input'));
    
            if ($data != NULL) {
                if (Update::update($data->id_option, $data->option)) {
                    http_response_code(200);
                
                } else {
                    http_response_code(400);
                }
                
            } else {
                http_response_code(405);
            }
    
    
        break;

        case 'DELETE':

            if(isset($_GET['id_option'])){
                if (Delete::delete($_GET['id_option'])) {
                    http_response_code(200);
                } else {
                    http_response_code(400);
                } 
            } else {
                http_response_code(405);
            }
    
            break;
    
        default:
           http_response_code(405);
        break;
}

?>