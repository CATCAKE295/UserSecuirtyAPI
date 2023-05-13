<?php 


require_once "./connection/Connection.php";

class Rol_user {

    public  function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM rol_user";
        $result = $db->query($query);
        $data = [];
        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol_user' => $row['id_rol_user'],
                    'id_rol' => $row['id_rol'],
                    'id_user' => $row['id_user']
                ];

            }
            return $data;
        }
        echo json_encode(['Error al listar datos']);
        return $data;
    }

    public function getWhere($rol_user_id){

        $db = new Connection();
        $query = "SELECT * FROM rol_user WHERE id_rol_user = $rol_user_id";
        $result = $db->query($query);
        $data = [];

        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_rol_user' => $row['id_rol_user'],
                    'id_rol' => $row['id_rol'],
                    'id_user' => $row['id_user']
                ];

            }
            echo json_encode(['Mensaje' => 'Dato especifico encontrado']);
            return $data;

        }
        echo json_encode(['Error al encontar el dato especifico']);
        return $data;

    }

    public function insert($rol_id, $user_id){

        $db = new Connection();
        $query = "INSERT INTO rol_user (id_rol, id_user)
        VALUE ('".$rol_id."' , '".$user_id."')";
        
        $query_rol = "SELECT * FROM db_user_security.rol WHERE id_rol = $rol_id";
        $query_user = "SELECT * FROM db_user_security.user WHERE id_user= $user_id" ;

        $result1 = mysqli_query($db, $query_rol);
        $result2 = mysqli_query($db, $query_user);
        
        if(mysqli_num_rows($result1) === 0 || mysqli_num_rows($result2) === 0){
            echo json_encode(['Error al registrar']);
        }
        else{
            $db->query($query);
            echo json_encode(['Mensaje' => 'El registrado de los datos resulto exitoso']);
            
        }
        
    }

    public function update($rol_user_id, $rol_id, $user_id){
        $db = new Connection();
        $query = "UPDATE rol_user SET 
                    id_rol='".$rol_id."',
                    id_user='".$user_id."'
                  WHERE id_rol_user=$rol_user_id";

        $query_roluser = "SELECT * FROM db_user_security.rol_user WHERE id_rol_user = $rol_user_id";
        $query_rol = "SELECT * FROM db_user_security.rol WHERE id_rol = $rol_id";
        $query_user = "SELECT * FROM db_user_security.user WHERE id_user= $user_id" ;

        $result1 = mysqli_query($db, $query_roluser);
        $result2 = mysqli_query($db, $query_rol);
        $result3 = mysqli_query($db, $query_user);

        
        if(mysqli_num_rows($result1) === 0 || mysqli_num_rows($result2) === 0 || mysqli_num_rows($result3) === 0){
            echo json_encode(['Error al actualizar']);
        }
        else{
            $db->query($query);
            echo json_encode(['Mensaje' => 'Actualizacion de los datos resulto exitosa']);
        }
    }

    public function delete($rol_user_id){
        $db = new Connection();
        $query = "DELETE FROM rol_user WHERE id_rol_user= $rol_user_id";

        $query_roluser = "SELECT * FROM db_user_security.rol_user WHERE id_rol_user = $rol_user_id";
        $result = mysqli_query($db, $query_roluser);

        if(mysqli_num_rows($result) === 0 ){
            echo json_encode(['Error al eliminar']);
        }
        else{
            $db->query($query);
            echo json_encode(['Mensaje' => 'La eliminacion de los datos resulto exitosa']);
        }
    }
}

?>