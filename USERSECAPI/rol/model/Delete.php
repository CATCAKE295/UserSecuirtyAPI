<?php 

require_once "../connection/Connection.php";

class Delete {

    public static function delete($id_rol){
        $db = new Connection();
        $query = "DELETE FROM rol WHERE id_rol = $id_rol;";
        $db->query($query);
        if ($db->affected_rows) {
            echo json_encode(['Mensaje' => 'El rol ha sido borrado correctamente']);
        } else {

            echo json_encode(['Error' => mysqli_error($db)]);

        }

        mysqli_close($db);
    }


}




?>