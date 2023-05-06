<?php

require_once "../connection/Connection.php";

class Rol_user_getAll{

    public static function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM rol_user";
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