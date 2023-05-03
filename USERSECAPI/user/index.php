
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
    
    default:
        # code...
        break;
}



?>