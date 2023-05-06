<?php

require_once "../connection/Connection.php";

class Read {

    public static function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM rol";
        $result = $db->query($query);
        $data = [];
        
        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol' => $row['id_rol'],
                    'rol' => $row['rol']
                ];

            }
            return $data;
        }

        return $data;

        mysqli_close($db);
    }


    public static function getWhere($rol_id){

        $db = new Connection();
        $query = "SELECT * FROM rol WHERE id_rol = $rol_id";
        $result = $db->query($query);
        $data = [];

        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol' => $row['id_rol'],
                    'rol' => $row['rol']

                ];

            }
            return $data;
        }

        return $data;


        mysqli_close($db);

    }

}