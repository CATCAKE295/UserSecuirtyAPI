<?php

require_once "../connection/Connection.php";

class Create {
    public static function insert($rol){
        $db = new Connection();
        $query = "INSERT INTO rol (rol) VALUES( '".$rol."' );";
        $db->query($query);
        if ($db -> affected_rows) {

            echo json_encode(['Mensaje' => 'El rol '. $rol .' ha sido registrado correctamente']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }

        mysqli_close($db);
    }
}