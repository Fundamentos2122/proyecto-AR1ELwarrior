<?php 

// var_dump($_POST);

include("../models/DB.php");
include("../models/User.php");

try {
    $connection = DBConnection::getConnection();
}
catch(PDOException $e) {
    error_log("Error de conexión - " . $e, 0);

    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["_method"] === "POST") {
        $nombre = trim($_POST["nombre"]);
        $password = trim($_POST["password"]);

        try {
            $query = $connection->prepare('SELECT * FROM usuarios WHERE nombre = :nombre');
            $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() === 0) {
                echo "Usuario no encontrado";
                // header('Location: http://localhost/proyectoavance3/');
                exit();
            }

            $user;

            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $user = new User($row["id"], $row["nombre"],$row["email"], $row["password"],  $row["type"]);
            }

            if (!password_verify($password, $user->getPassword())) {
                echo "Contraseña inválida";
                exit();
            }

            session_start();

            $_SESSION["id"] = $user->getId();
            $_SESSION["nombre"] = $user->getNombre();
            $_SESSION["email"] = $user->getEmail();
            $_SESSION["password"] = $user->getPassword();
            $_SESSION["type"] = $user->getType();

            header('Location: http://localhost/proyectoavance3/views/home.php');
            exit();
        }
        catch(PDOException $e) {
            echo $e;
        }
    }
    else if($_POST["_method"] === "DELETE") {
        session_start();

        session_destroy();

        header('Location: http://localhost/proyectoavance3/');

        exit();
    }
}

?>