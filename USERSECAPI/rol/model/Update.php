<?php 

require_once "../connection/Connection.php";

class Update {

    public static function update($id_rol,$rol){

        $db = new Connection();

        $query = "UPDATE rol SET rol = '".$rol."' WHERE id_rol = $id_rol;";

        $db->query($query);

        if ($db -> affected_rows) {

            echo json_encode(['Mensaje' => 'El rol '. $rol .' ha sido actualizado correctamente']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }

        mysqli_close($db);


    }
    
}



?>