<?php 

include("../models/DB.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    }
}

?>