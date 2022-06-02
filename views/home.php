<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d5ef93086f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/home.css">
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
                <button class="sub" onclick="location.href='../views/submit.php'">SUBMIT</button>
            </ul>
        </div> 
        <div class="info1">
            <button class="i1icon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
        <div class="info1">
            <button class="i1icon2"> Publications </button>
        </div>
    </div>

    <div class="container">

        <div class="view">
            <div class="header">
            <ul>
                <div class="titulo">HOME</div>
                <li> <a href="../views/chat.php"><img class="icon" src="../imgs/chat.png" alt=""></a></li>
            </ul>
            <div class="info1">
            <button class="i1icon2"onclick="location.href='../views/home.php'"> Publications </button>
        </div>
            </div>
            <div class="info1">
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <form action="../controllers/accessControler.php" method="POST" class="logout-icon">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="i1icon" value="LOG OUT">
        </form>
        </div>
        </div>

        <div id="art-List">

        </div>
         <!-- <div class="sub-container" >
            
            <div class="info2">
                <div><img class="profimg" src="../imgs/pimg.jpg" alt=""></div>
                <div name= nombreuser></div>
                <button class="follow">FOLLOWING</button>
            </div>
            <div class="info4">
                <div class="mensaje"> </div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src=" data:image/jpeg;base64,${list[i].imagen}" alt=""></div>
                <div class="interact">
                <form class="add" id="form-fav" action="../controllers/favoritoController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                <input class="intitem" type="image"  src="../imgs/like.png" width="100px" alt="Submit">
                </form>
                <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>
                    <form class="add" id="form-com" action="../controllers/comentController.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="id" value="">s
                    <input class="intitem" type="image"  src="../imgs/comment.png" width="100px" alt="Submit">
                    <div>
                    <input name= "texto" class="comment" type="text" placeholder="Add a comment" width="50%"> </input>
                    </div>
                    </form>
                </div>
                    <div class="info5"> ESTE ES UN COMENTARIO <div id= "com-List" class="comentario"> </div>  </div>  
                </div> 
            </div>   -->
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
    include("modalDelete.php"); 
    include("modalPostEdit.php"); 
        include("../assets/js/script_submit.php");
     ?>
</body>
</html>