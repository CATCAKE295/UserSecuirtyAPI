<?php 


require_once "./connection/Connection.php";

class Option {


    public  function getAll(){
        $db = new Connection();
        $query = "SELECT * FROM `option`;";
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
    
    public  function getWhere($id_option){

        $db = new Connection();
        $query = "SELECT * FROM `option` WHERE id_option  = $id_option";
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


    public function insert($option){
        $db = new Connection();
        $query = "INSERT INTO `option` (`option`) VALUES( '".$option."' );";
        $db->query($query);
        if ($db -> affected_rows) {
            echo json_encode(['Mesage' => 'The option has been added']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }


    public function update($id_option,$option){
        $db = new Connection();
        $query = "UPDATE `option` SET `option` = '".$option."' WHERE id_option = $id_option;";
        $db->query($query);

        if ($db -> affected_rows) {
            echo json_encode(['Mesage' => 'The option has been updated']);
            return true;
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }


    public function delete($id_option){
        $db = new Connection();
        $query = "DELETE FROM `option` WHERE id_option = $id_option;";
        $db->query($query);
        if ($db->affected_rows) {
            echo json_encode(['Mesage' => 'La opcion ha sido borrada correctamente']);
        } else {
            echo json_encode(['Error' => mysqli_error($db)]);
        }
        mysqli_close($db);
    }


    

}


?>