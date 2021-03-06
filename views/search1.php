<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/search.css">
    <title>SEARCH</title>
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
        <div class="info1">
        <button class="i1icon"onclick="location.href='../views/search1.php'"> 3D </button>
            <button class="i1icon"onclick="location.href='../views/search2.php'"> DIGITAL ART </button>
            <button class="i1icon"onclick="location.href='../views/search3.php'"> COMIC </button>
            <button class="i1icon"onclick="location.href='../views/search4.php'"> PIXEL ART </button>
            <button class="i1icon"onclick="location.href='../views/search5.php'"> FANARTS </button>
        </div>

    <div class="container">
    <div class="view">
            <div class="header">
            <ul>
                <div class="titulo">SEARCH</div>
                <li> <a href="../views/chat.php"><img class="icon" src="../imgs/chat.png" alt=""></a></li>
            </ul>
            </div>
            <div class="info12">
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
        </div>

        <div class="sub-container">
            <div class="info2">
                <div>DAILY ARTS</div>
            </div>
            <div class="info3">
            <div id="art-List"></div>
            <!-- <img class="img1" src="../imgs/3d1.jpg" alt="">
                 <img class="img2" src="../imgs/3d2.jpg" alt="">
                 <img class="img3" src="../imgs/3d3.jpg" alt="">
                 <img class="img4" src="../imgs/3d4.jpg" alt=""> -->
            </div>
        </div>
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
    <?php 
        include("../assets/js/script_galeria.php");
     ?>
</body>
</html>