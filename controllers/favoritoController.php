<?php 

include("../models/DB.php");
include("../models/Favoritos.php");

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

            $query = $connection->prepare('SELECT * FROM favoritos WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
            $fav;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $fav = new Fav($row['id'], $row['iduser'], $row['idimg']);
            }
    
            echo json_encode($fav->getArray());
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
    else {
        //Obtener TODOS los registros
        try {
            session_start();
            $iduser = $_SESSION["id"];
            $query = $connection->prepare('SELECT * FROM favoritos WHERE  iduser = :iduser');
            $query->bindParam(':iduser',$iduser,PDO::PARAM_INT);
            $query->execute();
            $favs = array();
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $fav = new Fav($row['id'], $row['iduser'], $row['idimg']);
    
                $favs[] = $fav->getArray();
            }
    
            echo json_encode($favs);
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("_method",$_POST)){
        //Utilizar el arreglo $_POST   
        if($_POST["_method"] === "POST"){
            session_start();
            $iduser = $_SESSION["id"];
            $idimg = $_POST["idpost"];
            postFav($iduser,$idimg,true);
        }
        else if($_POST["_method"] === "PUT"){
            putComent($_POST["id"],$_POST["texto"],true);
        }
    }
    else{
        $data = json_decode(file_get_contents("php://input"));
        if($data->_method === "DELETE")
         deleteFav($data->id,true);
     }
   exit();
}

function postFav($iduser,$idimg,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO favoritos VALUES(NULL,:iduser, :idimg)');
        $query->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $query->bindParam(':idimg', $idimg, PDO::PARAM_INT);
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

function putFav($id,$iduser,$idimg,$imagen,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE favoritos SET iduser = :iduser,idimg = :idimg, imagen = :imagen WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $query->bindParam(':idimg', $idimg, PDO::PARAM_INT);
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo("404: Error en la actualización");
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
function deleteFav($id, $redirect) {
    session_start();
    $iduser = $_SESSION["id"];
    global $connection;
    try {
        $query = $connection->prepare('DELETE FROM favoritos WHERE idimg = :id AND iduser = :iduser');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la eliminación";
        }
        else {
            if ($redirect) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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