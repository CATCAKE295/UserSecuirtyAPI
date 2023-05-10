<?php
require_once '../connection/Connection.php';

class Delete{
    public static function remove( $id_rol_option){
        $db = new Connection();
        $query = "DELETE FROM codesociety_uca_user.rol_option WHERE id_rol_option = $id_rol_option";
        $db -> query($query);

        if($db -> affected_rows)
        {
            echo json_encode(['Mensaje' => 'Consulta del delete rol_option ejecutada correctamente']);

        }else
        {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }
}
?>