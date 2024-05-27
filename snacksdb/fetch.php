<?php   
    if($_SERVER['REQUEST_METHOD']=='GET'){
        require_once('conexion.php'); 
        $id = $_GET['id_usuario'];
        
        $query = "SELECT * FROM usuario WHERE id_usuario = '$id'";
        $result = $mysql->query($query);
        
        if($mysql->affected_rows >0 ){
            while($row = $result -> fetch_assoc()){
                $array = $row;
        }
        echo json_encode($array);
    }else{
        echo "Not found any rows";
    }
    $result -> close();
    $mysql ->close();
}
?>