<?php 

require_once "../connection/Connection.php";

class Create {
    public static function insert($username,$name,$lastname,$password,$email){
        $db = new Connection();
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO db_user_security.user (username, name, lastname, password, email)
        VALUES ('".$username."','".$name."','".$lastname."','".$password_hash."','".$email."')";
        
        $db->query($query);

        $id = $db->insert_id;

        echo json_encode(['Mensaje' => 'El usuario '. $name .' registrado Correctamente']);
       
    
        if($db->affected_rows){

        
            $token = bin2hex(random_bytes(16));

            echo json_encode(['Token Usuario' => 'Token del usuario ' . $token]);

            $token_cifrado = password_hash($token, PASSWORD_DEFAULT);

            $queryToken = "INSERT INTO token (id_user, token) VALUES ('".$id."','".$token_cifrado."');";
            $db->query($queryToken);

            if ($db->affected_rows) {
                return true;
            }
        }
        return false;
    }
}