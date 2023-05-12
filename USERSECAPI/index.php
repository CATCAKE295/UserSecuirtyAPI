<?php 

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

require_once "./models/User.php";
require_once "./models/Rol.php";
require_once "./models/Option.php";
require_once "./models/Rol_option.php";
require_once "./models/Rol_user.php";

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';
$url = explode('/', $path);

switch ($url[1]){

    case "User": 

        $user = new User();

        if ($method == 'GET') {

            if (isset($url[2])) {
                $id = $url[2];

                header('Content-Type: application/json');
                echo json_encode($user->getWhere($id));

     
            } else {
                header('Content-Type: application/json');
                echo json_encode($user->getAll());
            }

            
        } elseif($method == 'POST') {

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $user->insert($data->username,$data->name,$data->lastname,$data->password,$data->email);
            }

        } elseif($method == 'PUT') {

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $user->update($data->id_user,$data->username,$data->name,$data->lastname,$data->password,$data->email);
            }

        } elseif($method == 'DELETE') {

            $id = $url[2];
            $user->delete($id);

        }

        break;
    case 'Rol':

        $rol = new Rol();

        if ($method == 'GET') {

            if (isset($url[2])) {

                $id = $url[2];

                header('Content-Type: application/json');
                echo json_encode($rol->getWhere($id));



            } else {


                header('Content-Type: application/json');
                echo json_encode($rol->getAll());
                
            }

        } elseif ($method == 'POST') {

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $rol->insert($data->rol);
            }
            

        } elseif ($method == 'PUT'){

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $rol->update($data->id_rol,$data->rol);
            }

        } elseif ($method == 'DELETE') {

            $id = $url[2];
            $rol->delete($id);


        }

        break;
    
    case 'Option':

        $option= new Option();

        if ($method == 'GET') {

            if (isset($url[2])) {

                $id = $url[2];

                header('Content-Type: application/json');
                echo json_encode($option->getWhere($id));

            } else {

                header('Content-Type: application/json');
                echo json_encode($option->getAll());
                
            }
            
            # code...
        } elseif ($method == 'POST') {

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $option->insert($data->option);
            }
            # code...
        } elseif ($method == 'PUT') {

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $option->update($data->id_option,$data->option);
            }

        } elseif ($method == 'DELETE') {
            # code...
            $id = $url[2];
            $option->delete($id);
        }
        break;

    case 'Rol_option':

        $rolOption = new Rol_option();

        if ($method == 'GET') {

            if (isset($url[2])) {
                
                $id = $url[2];

                header('Content-Type: application/json');
                echo json_encode($rolOption->showbyid($id));
                   
                
            } else {

                header('Content-Type: application/json');
                echo json_encode($rolOption->show());

            }

            # code...
        } elseif ($method == 'POST') {
            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $rolOption->insert($data->id_rol,$data->id_option);
            }
            # code...
        } elseif ($method == 'PUT') {
            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL) {
                $rolOption->update($data->id_rol_option,$data->id_rol,$data->id_option);
            }
        } elseif ($method == 'DELETE'){
            $id = $url[2];
            $rolOption->remove($id);
         }


        break;


    case 'Rol_user':

        $rolUser = new Rol_user();

        if ($method == 'GET') {

            if (isset($url[2])) {
                $id = $url[2];

                header('Content-Type: application/json');

                echo json_encode($rolUser->getWhere($id));

            } else {

                header('Content-Type: application/json');
                echo json_encode($rolUser->getAll());
            }
            

        } elseif ($method == 'POST') {
            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL){

                $rolUser->insert($data->id_rol,$data->id_user);

            }
        } elseif ($method == 'PUT') {

            $data = json_decode(file_get_contents('php://input'));

            if ($data != NULL){

                $rolUser->update($data->id_rol_user,$data->id_rol,$data->id_user);

            }

        } elseif ($method == 'DELETE') {
            $id = $url[2];
            $rolUser->delete($id);
        }

        break;

    default:
           http_response_code(404);
           header('Content-Type: application/json');
           echo json_encode(['error' => 'Recurso no encontrado']);
        break;

        
}








?>