<?php 

require_once "../connection/Connection.php";

class Rol {

    public static function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM rol";
        $result = $db->query($query);
        $data = [];
        
        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol' => $row['id_rol'],
                    'rol' => $row['rol']
                ];

            }
            return $data;
        }

        return $data;

        mysqli_close($db);
    }


    public static function getWhere($rol_id){

        $db = new Connection();
        $query = "SELECT * FROM rol WHERE id_rol = $rol_id";
        $result = $db->query($query);
        $data = [];

        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol' => $row['id_rol'],
                    'rol' => $row['rol']

                ];

            }
            return $data;
        }

        return $data;


        mysqli_close($db);

    }

    public static function insert($rol){
        $db = new Connection();
        $query = "INSERT INTO rol (rol) VALUES( '".$rol."' );";
        $db->query($query);
        if ($db -> affected_rows) {

            echo json_encode(['Mensaje' => 'El rol '. $rol .' ha sido registrado correctamente']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }

        mysqli_close($db);
    }


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
    public static function delete($id_rol){
        $db = new Connection();
        $query = "DELETE FROM rol WHERE id_rol = $id_rol;";
        $db->query($query);
        if ($db->affected_rows) {
            echo json_encode(['Mensaje' => 'El rol ha sido borrado correctamente']);
        } else {

            echo json_encode(['Error' => mysqli_error($db)]);

        }

        mysqli_close($db);
    }


}



?>