<?php
require_once '../connection/Connection.php';

class Update{
    public static function remove($id_rol, $id_option, $id_rol_option){
        $db = new Connection();
        $query = "UPDATE codesociety_uca_user.rol_option SET id_rol = $id_rol, id_option = $id_option WHERE id_rol_option = $id_rol_option;";
        $db -> query($query);

        if($db -> affected_rows){
            echo json_encode(['Mensaje' => 'Consulta del update rol_option ejecutada correctamente']);
        }else{
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }
}

?>