<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/submit.css">
    <title>Home</title>
</head>
<body>
<?php  
    session_start();
    if(!array_key_exists("nombre",$_SESSION)){
        header('Location: http://localhost/proyectoavance3/views/login.php');
        exit();
    } 
?>
    <div class="headercontent">
        <div class="pcNavbar">
            <ul>
                
                <li> <a href="../views/home.php"><img class="icon" src="../imgs/creative-icon.png" alt=""> CreativeFolio</a></li>
                <li> <a href="../views/search0.php"><img class="icon" src="../imgs/search.png" alt=""></a><input type="search" class="search" placeholder="Search..."> </li>
                <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
                <button class="btnsub" onclick="location.href='../views/submit.php'">SUBMIT</button>
            </ul>
            <div class="info12">
            <button class="micon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="micon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="micon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
        </div> 
    </div>

    <div class="container">
        <div class="view">
        <div class="header">
            <ul>
                
                <div class="titulo">SUBMIT</div>
                <li> <a href="../views/chat.php"><img class="icon" src="../imgs/chat.png" alt=""></a></li>
            </ul>
        </div>
        <div class="info12">
            <button class="micon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="micon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <form action="../controllers/accessControler.php" method="POST" class="logout-icon">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="i1icon" value="LOG OUT">
        </form>
        </div>

        </div>        
        <div class="sub-container">
            <div class="submit">

                <form class="add" id="form-art" action="../controllers/postController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <div class="subblock">SELECT A FILE OR DRAG THE FILE TO SUBMIT <input type="file" class="art" name="imagen">
                </div>
                <input class="desc" name="genero" type="text" placeholder="Elige el genero del dibujo"> </input>
                <input class="desc" name="descripcion" type="text" placeholder="Add a description or a comment"> </input>
                <div class="interact">
                <input class="btn" type="submit" >
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="celNavbar">
        <ul>
            <li> <a href="../views/home.php"><img src="../imgs/home.png" alt="" class="icon"></a></li>
            <li> <a href="../views/search0.php"><img class="icon" src="../imgs/search.png" alt=""> </a></li>
            <button class="cel-sub">+</button>
            <li> <a href="../views/chat.php"><img class="icon" src="../imgs/notif.png" alt=""></a></li>
            <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
        </ul>
    </div>
</body>
</html>