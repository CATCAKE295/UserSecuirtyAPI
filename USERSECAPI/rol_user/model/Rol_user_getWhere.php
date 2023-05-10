<?php

require_once "../connection/Connection.php";

class Rol_user_getWhere{

    public static function getWhere($rol_user_id){

        $db = new Connection();
        $query = "SELECT * FROM rol_user WHERE id_rol_user = $rol_user_id";
        $result = $db->query($query);
        $data = [];

        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol_user' => $row['id_rol_user'],
                    'id_rol' => $row['id_rol'],
                    'id_user' => $row['id_user']
                ];

            }
            return $data;

        }
        return $data;

    }
}

?>