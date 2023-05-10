<?php

require_once "../connection/Connection.php";

class Rol_user_delete{

    public static function delete($rol_user_id){
        $db = new Connection();
        $query = "DELETE FROM rol_user WHERE id_rol_user= $rol_user_id";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }
}

?>