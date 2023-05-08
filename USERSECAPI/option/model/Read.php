<?php

class Read{
    public static function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM option";
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
    
    public static function getWhere($option){

        $db = new Connection();
        $query = "SELECT * FROM option WHERE id_option";
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