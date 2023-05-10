<?php

require_once "../connection/Connection.php";

class Rol_user_update{

    public static function update($rol_user_id, $rol_id, $user_id){
        $db = new Connection();
        $query = "UPDATE rol_user SET 
                    id_rol='".$rol_id."',
                    id_user='".$user_id."'
                  WHERE id_rol_user=$rol_user_id";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }
}

?>