<?php

require_once "../connection/Connection.php";

class Delete {

    public static function delete($id_user){
        $db = new Connection();

        $queryUser = "DELETE FROM user WHERE id_user = $id_user;";
        $queryToken = "DELETE FROM db_user_security.token WHERE id_user = $id_user;";

        if(mysqli_multi_query($db, $queryToken . $queryUser)) {
            echo json_encode(['mensaje' => 'Las dos consultas se ejecutaron correctamente.']);
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }

        mysqli_close($db);
    }

}