<?php

require_once "../connection/Connection.php";

class Rol_user_insert{

    public static function insert($rol_id, $user_id){
        $db = new Connection();
        $query = "INSERT INTO rol_user (id_rol, id_user)
        VALUE ('".$rol_id."' , '".$user_id."')";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }
}

?>