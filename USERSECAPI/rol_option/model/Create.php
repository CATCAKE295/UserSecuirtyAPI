<?php
require_once '../connection/Connection.php';

class Create{

    public static function insert($id_rol, $id_option){
        $db = new Connection();
        $query = "INSERT INTO codesociety_uca_user.rol_option VALUES ($id_rol, $id_option)";
        $db -> query($query);

        if($db -> affected_rows)
        {
            echo json_encode(['Mensaje' => 'Consulta del create rol_option ejecutada correctamente']);

        }else
        {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }
}

?>