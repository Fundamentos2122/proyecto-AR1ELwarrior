<?php 

include("../models/DB.php");
include("../models/Postdraw.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (array_key_exists("id", $_GET)) {
        //Obtener un solo registro
        try {
            $id = $_GET["id"];

            $query = $connection->prepare('SELECT * FROM publications WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
            $art;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $art = new Art($row['id'], $row['idUser'], $row['nombre'],$row['descripcion'],
                 $row['imagen'], $row['genero'], $row['timestamp']);
            }
    
            echo json_encode($art->getArray());
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
    else {
        //Obtener TODOS los registros
        session_start();
        $usuario = $_SESSION["id"];
        try {
            //$query_string = 'SELECT * FROM publications';
            $query_string = 'SELECT * FROM publications';
            $query = $connection->prepare($query_string);
            $query->execute();
            $arts = array();

            // if($_SESSION["type"] !== "admin") {
            //     $query_string = $query_string . ' AND user_id = :user_id';
            // }

            // $query = $connection->prepare($query_string);

            // if($_SESSION["type"] !== "admin") {
            //     $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            // }     
            // $query->execute();
    
            // $art = array();
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $art = new Art($row['id'], $row['idUser'], $row['nombre'],$row['descripcion'],
                 $row['imagen'], $row['genero'], $row['timestamp']);
    
                $arts[] = $art->getArray();
            }
    
            $pub = json_encode($arts);
            echo $pub;
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("descripcion",$_POST)){
        //Utilizar el arreglo $_POST
        $photo = "";
        if (sizeof($_FILES) > 0) {
            $tmp_name = $_FILES["imagen"]["tmp_name"];
    
            $photo = file_get_contents($tmp_name);

        }
        if($_POST["_method"] === "POST"){
            //Registro nuevo
            session_start();
            $iduser = $_SESSION["id"];
            $nombre = $_SESSION["nombre"];
            postArt($iduser,$nombre,$_POST["descripcion"],$photo,$_POST["genero"],true);
        }
        else if($_POST["_method"] === "PUT"){
            putArt($iduser,$_POST["nombre"],$_POST["descripcion"],$_POST["imagen"],$_POST["genero"],$_POST["timestamp"],true);
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){
            deleteArt($_POST["id"],true);
        }
    }
   exit();
}

function postArt($iduser,$nombre,$descripcion,$imagen,$genero,$redirect){
    global $connection;

     $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);


    try{
        $query = $connection->prepare('INSERT INTO publications VALUES(NULL,:id, :nombre,:descripcion, :imagen, :genero, :timestamp)');
        $query->bindParam(':id', $iduser, PDO::PARAM_INT);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->bindParam(':genero', $genero, PDO::PARAM_STR);
        $query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo("404: Error en la inserción");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/proyectoavance3/views/home.php');
            }
            else{
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
    }

}

function putArt($id,$iduser,$nombre,$descripcion,$imagen,$genero,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE publications SET nombre = :nombre,iduser = :idUser, descripcion = :descripcion, imagen = :imagen, genero = :genero WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':idUser', $iduser, PDO::PARAM_INT);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->bindParam(':genero', $genero, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo("404: Error en la actualización");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: http://localhost/proyectoavance3/views/submit.php');
            }
            else{
                echo "Registro guardado";
            }
        }

    }
    catch(PDOException $e){
        echo $e;
   }

}
function deleteArt($id, $redirect) {
    global $connection;

    try {
        $query = $connection->prepare('UPDATE publications WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la eliminación";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyectoavance3/views/submit.php');
            }
            else {
                echo "Registro eliminado";
            }
        }
    }
    catch(PDOException $e) {
        echo $e;
    }
}

?>