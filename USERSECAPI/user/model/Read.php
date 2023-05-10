<?php

require_once "../connection/Connection.php";

class Read {

    public static function getAll(){
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

    public static function getWhere($user_id){

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

}