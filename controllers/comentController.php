<?php 

include("../models/DB.php");
include("../models/Comment.php");

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

            $query = $connection->prepare('SELECT * FROM comentarios WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
            $com;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $com = new Coment($row['id'], $row['iduser'], $row['idpost'],$row['nombreuser'],
                 $row['texto']);
            }
            echo json_encode($com->getArray());
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
    else if (array_key_exists("idpost", $_GET)) {
        //Obtener TODOS los registros
        try {
            $idpost = $_GET["idpost"];
            //$query_string = 'SELECT * FROM publications';
            $query = $connection->prepare('SELECT * FROM comentarios WHERE  idpost = :idpost');//Se le cambia el nombre ya sea photocard, cds, etc
            $query->bindParam(':idpost',$idpost,PDO::PARAM_INT);
            $query->execute();
            $coms = array();
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $com = new Coment($row['id'], $row['iduser'], $row['idpost'],$row['nombreuser'],
                $row['texto']);
    
                $coms[] = $com->getArray();
            }
    
            echo json_encode($coms);
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
}
else if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(array_key_exists("texto",$_POST)){
        //Utilizar el arreglo $_POS

        if($_POST["_method"] === "POST"){
            //Registro nuevo
            session_start();
            $iduser = $_SESSION["id"];
            $idpost = $_POST["id"];
            $nombreuser = $_SESSION["nombre"];
            postComent($iduser,$idpost,$nombreuser,$_POST["texto"],true);//future
        }
        else if($_POST["_method"] === "PUT"){
            putComent($_POST["id"],$_POST["texto"],true);//future
        }
    }
    else if(array_key_exists("id",$_POST)){
        if($_POST["_method"] === "DELETE"){//AGREGO ESTO Y LA FUNCION, SOLO POR FORMULARIO
            deleteComent($_POST["id"],true);
        }
    }
   exit();
}

function postComent($iduser,$idpost,$nombreuser,$texto,$redirect){
    global $connection;

    try{
        $query = $connection->prepare('INSERT INTO comentarios VALUES(NULL,:iduser, :idpost,:nombreuser, :texto)');
        $query->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $query->bindParam(':idpost', $idpost, PDO::PARAM_INT);
        $query->bindParam(':nombreuser', $nombreuser, PDO::PARAM_STR);
        $query->bindParam(':texto', $texto, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo("404: Error en la inserción");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: ' . $_SERVER['HTTP_REFERER']);//Aqui se le cambia la ruta a la página de productos actual
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

function putComent($id,$texto,$redirect){
    global $connection;
    try{
        $query = $connection->prepare('UPDATE comentarios SET texto = :texto, WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->bindParam(':texto', $texto, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0){
            echo("404: Error en la actualización");
        }
        else{
            // echo "Registro guardado";
            if($redirect){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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
function deleteComent($id, $redirect) {
    global $connection;

    try {
        $query = $connection->prepare('UPDATE comentarios WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
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