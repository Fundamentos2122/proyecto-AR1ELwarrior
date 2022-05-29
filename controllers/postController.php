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

            $query = $connection->prepare('SELECT * FROM arts WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
    
            $tweet;
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $tweet = new Art($row['id'], $row['creador'], $row['imagen'],$row['comentario'], $row['timestamp'], $row['active']);
            }
    
            echo json_encode($tweet->getArray());
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
            $query_string = 'SELECT * FROM arts WHERE active = 1';

            if($_SESSION["type"] !== "admin") {
                $query_string = $query_string . ' AND user_id = :user_id';
            }

            $query = $connection->prepare($query_string);

            if($_SESSION["type"] !== "admin") {
                $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            }

            $query->execute();
    
            $art = array();
    
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $art = new Art($row['id'], $row['creador'], $row['imagen'],$row['comentario'], $row['timestamp'], $row['active']);
    
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
    if (array_key_exists("comentario", $_POST)) {
        //Utilizar el arreglo $_POST
        if ($_POST["_method"] === "POST") {
            //Registro nuevo
            postArt($_POST["comentario"], true);
        }
        else if ($_POST["_method"] === "PUT") {
            putArt($_POST["id"], $_POST["comentario"], true);
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

function postArt($text, $redirect) {
    global $connection;

    $timestamp = date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);

    session_start();

    $user_id = $_SESSION["id"];

    try {
        $query = $connection->prepare('INSERT INTO arts VALUES(NULL, :text, :text, :text :timestamp, 1, :user_id)');
        $query->bindParam(':text', $text, PDO::PARAM_STR);
        $query->bindParam(':text', $creador, PDO::PARAM_STR);
        $query->bindParam(':text', $comentario, PDO::PARAM_STR);
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

function putArt($id, $text, $redirect) {
    global $connection;

    try {
        $query = $connection->prepare('UPDATE art SET text = :text WHERE id = :id');
        $query->bindParam(':text', $text, PDO::PARAM_STR);
        $query->bindParam(':text', $imagen, PDO::PARAM_STR);
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