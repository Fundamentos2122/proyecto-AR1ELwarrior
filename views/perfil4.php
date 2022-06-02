<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/perfil.css">
    <title>Profile</title>
</head>
<body>
<?php  
    session_start();
    if(!array_key_exists("nombre",$_SESSION)){
        header('Location: http://localhost/proyectoavance3/views/login.php');
        exit();
    } 
?>
    <div class="pcNavbar">
        <ul>

                <li> <a href="../views/home.php"><img class="icon" src="../imgs/creative-icon.png" alt=""> CreativeFolio</a></li>
                <li> <a href="../views/search0.php"><img class="icon" src="../imgs/search.png" alt=""></a><input type="search" class="search" placeholder="Search..."> </li>
                <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
                <button class="sub" onclick="location.href='../views/submit.php'">SUBMIT</button>
        </ul>
        <div class="info12">
            <button class="i1icon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <form action="../controllers/accessControler.php" method="POST" class="logout-icon">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="i1icon" value="LOG OUT">
        </form>         
            </div> 
    </div> 
    <div class="view">
        <div class="celheader">
            <ul>
                
                <div class="titulo">PROFILE</div>
                <li> <a href="../views/chat.php"><img class="icon" src="../imgs/chat.png" alt=""></a></li>
            </ul>
        </div>
        <div class="info12">
            <button class="i1icon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
        </div>
    <div class="container">
        <div class="personal">
        <div class="data2">
            <div><img class="imgprofile" src="../imgs/pimg.jpg" alt=""></div>
            <div>Watchers: 50</div>
            <div>Watching: 120</div>
            <div>Art:25</div>
            </div>

            <!-- <button class="edit" onclick="location.href='../views/editprofile.php'">EDIT PROFILE</button> -->
            
        </div>

        <div class="opciones">
        <button class="i1icon" onclick="location.href='../views/perfil.php'"> GALLERY </button>
                <button class="i1icon" onclick="location.href='../views/perfil2.php'"> FAVOURITES </button>
                <button class="i1icon" onclick="location.href='../views/perfil4.php'"> SUSCRIPTION </button>
        </div>

        <div class="info2">
            <div class="intitem">  SUSCRIPCION: NORMAL <br> Acceso a poder interactuar con las publicaciones de otros usuarios y poder guardar tus propias obras de arte    </div>      </div>

    </div>
    <div class="celNavbar">
        <ul>
            <li> <a href="../views/home.php"><img src="../imgs/home.png" alt="" class="icon"></a></li>
            <li> <a href="../views/search0.php"><img class="icon" src="../imgs/search.png" alt=""> </a></li>
            <button class="cel-sub" onclick="location.href='../views/submit.php'">+</button>
            <li> <a href="../views/chat.php"><img class="icon" src="../imgs/notif.png" alt=""></a></li>
            <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
        </ul>
    </div>
</body>
</html>