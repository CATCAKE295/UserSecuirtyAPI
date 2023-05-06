<?php 

require_once "../connection/Connection.php";

class Update {
    public static function update($id_user,$username,$name,$lastname,$password,$email){
        $db = new Connection();
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE user SET 
        username= '".$username."', name= '".$name."', lastname='".$lastname."', password='".$password_hash."', email='".$email."' WHERE id_user=$id_user";
        $db->query($query);
        if($db->affected_rows){
            echo json_encode(['Mensaje' => 'El usuario '. $name .' ha sido actualizado correctamente ']);
            return true;
        }
        return false;
    }
}