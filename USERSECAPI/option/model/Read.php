<?php

require_once "../connection/Connection.php";

class Read{
    public static function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM db_user_security.option;";
        $result = $db->query($query);
        $data = [];
        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                $data[] = [
                    'id_option' => $row['id_option'],
                    'option' => $row['option']
                ];
            }
            return $data;
        }
        return $data;

        mysqli_close($db);
    }
    
    public static function getWhere($id_option){

        $db = new Connection();
        $query = "SELECT * FROM db_user_security.option WHERE id_option  = $id_option";
        $result = $db->query($query);
        $data = [];

        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_option' => $row['id_option'],
                    'option' => $row['option']
                ];
            }
            return $data;
        }
        return $data;

        mysqli_close($db);
    }
}

?>