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

            $query = $connection->prepare('SELECT * FROM draws WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
            $art;
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $tweet = new Art($row['id'], $row['creador'], $row['imagen'], $row['comentario']);
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

        $user_id = $_SESSION["id"];

        try {
            $query = $connection->prepare('SELECT * FROM draws WHERE active = 1 AND user_id = :user_id');
            $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $query->execute();
    
            $arts = array();
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $art = new Art($row['id'], $row['creador'], $row['imagen'], $row['comentario']);
    
                $arts[] = $art->getArray();
            }
    
            echo json_encode($arts);
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
}
else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (array_key_exists("creador", $_POST)) {
        //Utilizar el arreglo $_POST
        if ($_POST["_method"] === "POST") {
            //Registro nuevo
            postArt($_POST["creador"], true);
        }
        else if ($_POST["_method"] === "PUT") {
            putArt($_POST["id"], $_POST["creador"], true);
        }
    }
    else if (array_key_exists("id", $_POST)) {
        if ($_POST["_method"] === "DELETE") {
            deleteArt($_POST["id"], true);
        }
    }
    else {
        //Utilizar file_get_contents
        $data = json_decode(file_get_contents("php://input"));

        if ($data->_method === "POST") {
            postArt($data->text, false);
        }
        else if($data->_method === "PUT") {
            putArt($data->id, $data->text, false);
        }
    }

    exit();
}

function postArt($imagen, $redirect) {
    global $connection;

    $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);

    session_start();

    $user_id = $_SESSION["id"];

    try {
        $query = $connection->prepare('INSERT INTO arts VALUES(NULL, :imagen, :timestamp, 1, :user_id)');
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la inserción";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyectoavance3/views/');
            }
            else {
                echo "Registro guardado";
            }
        }
    }
    catch(PDOException $e) {
        echo $e;
    }
}

function putArt($id, $imagen, $redirect) {
    global $connection;

    try {
        $query = $connection->prepare('UPDATE imagen SET text = :imagen WHERE id = :id');
        $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la actualización";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyectoavance3/views/');
            }
            else {
                echo "Registro guardado";
            }
        }
    }
    catch(PDOException $e) {
        echo $e;
    }
}

function deleteArt($id, $redirect) {
    global $connection;

    try {
        $query = $connection->prepare('UPDATE arts SET active = 0 WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la eliminación";
        }
        else {
            if ($redirect) {
                header('Location: http://localhost/proyectoavance3/views/');
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