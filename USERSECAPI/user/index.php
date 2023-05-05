
<?php 

require_once "model/User.php";

switch ($_SERVER['REQUEST_METHOD']) {

    case 'GET':

        if (isset($_GET['id_user'])) {
            echo json_encode(User::getWhere($_GET['id_user']));
        } else {
            echo json_encode(User::getAll());
        }
        
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'));

        if ($data != NULL) {
            if (User::insert($data->username,$data->name,$data->lastname,$data->password,$data->email)) {
                http_response_code(200);            
            } else {
                http_response_code(400); 
            }
            
        } else {
            http_response_code(405);
        }
       
        break;

    case 'DELETE':

        if(isset($_GET['id_user'])){
            if (User::delete($_GET['id_user'])) {
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