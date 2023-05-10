<?php 

require_once "../connection/Connection.php";

class Delete {

    public static function delete($id_option){
        $db = new Connection();
        $query = "DELETE FROM db_user_security.option WHERE id_option = $id_option;";
        $db->query($query);
        if ($db->affected_rows) {
            echo json_encode(['Mesage' => 'La opcion ha sido borrada correctamente']);
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }
}
?>