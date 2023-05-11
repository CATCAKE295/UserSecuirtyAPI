<?php 

require_once "./connection/Connection.php";


class Rol_option {

    public static function show(){
        $db = new Connection();
        $query = "SELECT * FROM codesociety_uca_user.rol_option";
        $result = $db -> query($query);

        $data = [];
        
        if($result -> num_rows){
            while($row = $result -> fetch_assoc()){

                $data[] = [
                    'id_rol_option' => $row['id_rol_option'], 
                    'id_rol' => $row['id_rol'], 
                    'id_option' => $row['id_option']
                ];
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


    public static function insert($id_rol, $id_option){
        $db = new Connection();
        $query = "INSERT INTO codesociety_uca_user.rol_option (id_rol, id_option) VALUES ('".$id_rol."','".$id_option."')";
        $db -> query($query);

        if($db -> affected_rows)
        {
            echo json_encode(['Mensaje' => 'Consulta del create rol_option ejecutada correctamente']);

        }else
        {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }

    public static function update($id_rol_option, $id_rol, $id_option){
        $db = new Connection();
        $query = "UPDATE codesociety_uca_user.rol_option SET id_rol='".$id_rol."', id_option= '".$id_option."' WHERE id_rol_option= '".$id_rol_option."';";
        $db -> query($query);

        if($db -> affected_rows){
            echo json_encode(['Mensaje' => 'Consulta del update rol_option ejecutada correctamente']);
        }else{
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }


    public static function remove($id_rol_option){
        $db = new Connection();
        $query = "DELETE FROM codesociety_uca_user.rol_option WHERE id_rol_option = $id_rol_option";
        $db -> query($query);

        if($db -> affected_rows)
        {
            echo json_encode(['Mensaje' => 'Consulta del delete rol_option ejecutada correctamente']);

        }else
        {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }






}


?>