<?php
require_once '../connection/Connection.php';

class Read{

    public static function show(){
        $db = new Connection();
        $query = "SELECT * FROM codesociety_uca_user.rol_option";
        $result = $db -> query($query);

        $data = [];
        
        if($result -> num_rows){
            while($row = $result -> fetch_assoc()){
                $data[] = ['id_rol_option' => $row['id_rol_option'], 'id_rol' => $row['id_rol'], 'id_option' => $row['id_option']];
            }
            return $data;
        }
        return $data;
        mysqli_close($db);
    }
    
    public static function showbyid($id_rol_option){
        $db = new Connection();
        $query = "SELECT * FROM codesociety_uca_user.rol_option WHERE id_rol_option = $id_rol_option";
        $result = $db -> query($query);

        $data = [];
        
        if($result -> num_rows){
            while($row = $result -> fetch_assoc()){
                $data[] = ['id_rol_option' => $row['id_rol_option'], 'id_rol' => $row['id_rol'], 'id_option' => $row['id_option']];
            }
            return $data;
        }
        return $data;
        mysqli_close($db);

    }
}

?>