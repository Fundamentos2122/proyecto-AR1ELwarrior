<?php 

include("../models/DB.php");
include("../models/User.php");

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
            $query = $connection->prepare('SELECT * FROM usuarios WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $user;
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $user = new User($row['id'], $row['nombre'], $row['email'],$row['password'],
                 $row['type']);
            }    
            echo json_encode($user->getArray());
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST["_method"] === "PUT"){
        putUser($_POST["nombre"],true);//future
    }
    else{
    //Obtener información del POST
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $type = "normal";
    try {
        $query = $connection->prepare('INSERT INTO usuarios VALUES(NULL, :nombre, :email,:password, :type)');
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() === 0) {
            echo "Error en la inserción";
        }
        else {
            header('Location: http://localhost/proyectoavance3/views/login.php');
        }
    }
    catch(PDOException $e) {
        echo $e;
    }}
}

function putUser($nombre,$redirect){
    global $connection;
    session_start();
    $id = $_SESSION["id"];
    try{
        $query = $connection->prepare('UPDATE usuarios SET nombre = :nombre WHERE id = :id');//Para actualizar es con una coma
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
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
?>