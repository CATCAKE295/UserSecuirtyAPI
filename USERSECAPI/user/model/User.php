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
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'password' => $row['password'],
                    'email' => $row['email']
                
                ];

            }
            return $data;
        }

        return $data;

        mysqli_close($db);
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
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'password' => $row['password'],
                    'email' => $row['email']
                
                ];

            }
            return $data;
        }

        return $data;

        mysqli_close($db);

    }


    public static function insert($username,$name,$lastname,$password,$email){
        $db = new Connection();
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO db_user_security.user (username, name, lastname, password, email)
        VALUES ('".$username."','".$name."','".$lastname."','".$password_hash."','".$email."')";
        $db->query($query);

        $id = $db->insert_id;
       
    
        if($db->affected_rows){

        
            $token = bin2hex(random_bytes(16));
            $token_cifrado = password_hash($token, PASSWORD_DEFAULT);;
            $queryToken = "INSERT INTO token (id_user, token) VALUES ('".$id."','".$token_cifrado."');";
            $db->query($queryToken);

            if ($db->affected_rows) {
                return true;
            }
        }
        return false;
    }

    


}




?>