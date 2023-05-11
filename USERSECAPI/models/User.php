<?php 

require_once "./connection/Connection.php";

class User {


    public function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM user WHERE state <> 3";
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
                    'email' => $row['email'],
                    'state' => $row['state']
                
                ];

            }
            return $data;
        }

        return $data;

        mysqli_close($db);
    }


    public function getWhere($user_id){

        $db = new Connection();
        $query = "SELECT * FROM user WHERE id_user = $user_id AND `state` <> 3";
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
                    'email' => $row['email'],
                    'state' => $row['state']
                
                ];

            }
            return $data;
        }

        return $data;

        mysqli_close($db);

    }


    public function insert($username,$name,$lastname,$password,$email){
        $db = new Connection();
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO codesociety_uca_user.user (username, name, lastname, password, email, state)
        VALUES ('".$username."','".$name."','".$lastname."','".$password_hash."','".$email."',1)";
        
        $db->query($query);

        $id = $db->insert_id;

        echo json_encode(['Mensaje' => 'El usuario '. $name .' registrado Correctamente']);
       
    
        if($db->affected_rows){

        
            $token = bin2hex(random_bytes(16));

            echo json_encode(['Token Usuario' => 'Token del usuario ' . $token]);

            $token_cifrado = password_hash($token, PASSWORD_DEFAULT);

            $queryToken = "INSERT INTO token (id_user, token) VALUES ('".$id."','".$token_cifrado."');";
            $db->query($queryToken);

            if ($db->affected_rows) {
                return true;
            }
        }
        return false;
    }

    public  function update($id_user,$username,$name,$lastname,$password,$email){
        $db = new Connection();
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE user SET 
        username= '".$username."', name= '".$name."', lastname='".$lastname."', password='".$password_hash."', email='".$email."', state= 2 WHERE id_user=$id_user";
        $db->query($query);
        if($db->affected_rows){
            echo json_encode(['Mensaje' => 'El usuario '. $name .' ha sido actualizado correctamente ']);
            return true;
        }
        return false;
    }

    public static function delete($id_user){
        $db = new Connection();


        $query = "UPDATE codesociety_uca_user.user SET `state` = 3 WHERE id_user = $id_user;";
        $db->query($query);

    
        if($db->affected_rows) {
            echo json_encode(['mensaje' => 'El usuairo se borro correctamente']);
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }

        mysqli_close($db);
    }


}


?>