<?php

require_once "../connection/Connection.php";

class Delete {

    public static function delete($id_user){
        $db = new Connection();


        $query = "UPDATE codesociety_uca_user.user SET `state` = 3 WHERE id_user = $id_user;";
        $db->query($query);

    
        if($db->affected_rows) {
            echo json_encode(['mensaje' => 'El usuairo se borro correctamente']);
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }

        mysqli_close($db);
    }

}