<?php

require_once "../connection/Connection.php";

class Create {
    public static function insert($option){
        $db = new Connection();
        $query = "INSERT INTO option (option) VALUES( '".$option."' );";
        $db->query($query);
        if ($db -> affected_rows) {
            echo json_encode(['Mesage' => 'The option has been added']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }
}