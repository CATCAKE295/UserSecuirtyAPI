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
            return $data;

        }
        return $data;

    }

    public function insert($rol_id, $user_id){
        $db = new Connection();
        $query = "INSERT INTO rol_user (id_rol, id_user)
        VALUE ('".$rol_id."' , '".$user_id."')";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }

    public function update($rol_user_id, $rol_id, $user_id){
        $db = new Connection();
        $query = "UPDATE rol_user SET 
                    id_rol='".$rol_id."',
                    id_user='".$user_id."'
                  WHERE id_rol_user=$rol_user_id";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }

    public function delete($rol_user_id){
        $db = new Connection();
        $query = "DELETE FROM rol_user WHERE id_rol_user= $rol_user_id";
        $db->query($query);
        if($db->affected_rows){
            return TRUE;
        }
        return FALSE;
    }



}


?>