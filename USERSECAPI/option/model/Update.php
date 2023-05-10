<?php 

require_once "../connection/Connection.php";

class Update {

    public static function update($id_option,$option){
        $db = new Connection();
        $query = "UPDATE db_user_security.option SET `option` = '".$option."' WHERE id_option = $id_option;";
        $db->query($query);

        if ($db -> affected_rows) {
            echo json_encode(['Mesage' => 'The option has been updated']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }
}
?>