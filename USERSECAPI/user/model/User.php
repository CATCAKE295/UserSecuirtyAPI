<?php 

require_once "../connection/Connection.php";

class User{

    public static function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM user";
        $result = $db->query($query);
        $data = [];
        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_user' => $row['id_user'],
                    'username' => $row['username'],
                    'name' => $row['lastname'],
                    'lastname' => $row['lastname'],
                    'password' => $row['password'],
                    'email' => $row['email']
                
                ];

            }
            return $data;
        }

        return $data;
    }


    public static function getWhere($user_id){

        $db = new Connection();
        $query = "SELECT * FROM user WHERE id_user = $user_id";
        $result = $db->query($query);
        $data = [];

        if($result->num_rows){
            while($row = $result->fetch_assoc()){

                $data[] = [
                    'id_user' => $row['id_user'],
                    'username' => $row['username'],
                    'name' => $row['lastname'],
                    'lastname' => $row['lastname'],
                    'password' => $row['password'],
                    'email' => $row['email']
                
                ];

            }
            return $data;
        }

        return $data;

    }

    


}

?>