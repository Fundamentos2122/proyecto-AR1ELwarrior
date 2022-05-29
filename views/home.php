<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Home</title>
</head>
<body>

    <div class="headercontent">
        <div class="pcNavbar">
            <ul>
                <li> <a href="../views/home.php"><img class="icon" src="../imgs/creative-icon.png" alt=""> CreativeFolio</a></li>
                <li> <a href="../views/search.php"><img class="icon" src="../imgs/search.png" alt=""></a><input type="search" class="search" placeholder="Search..."> </li>
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
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
        </div>

        <div class="sub-container">
            <div class="info2">
                <div><img class="profimg" src="../imgs/wy.jpg" alt=""></div>
                <div> WIZYAKUZA</div>
                <button class="follow">+FOLLOW</button>
                <div><img class="profimg" src="../imgs/edit.png" alt=""></div>
                <div><img class="profimg" src="../imgs/cerrar.png" alt=""></div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src="../imgs/imagen.jpg" alt=""></div>
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                    <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
                </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
        </div>
        <div class="sub-container">
            <div class="info2">
                <div><img class="profimg" src="../imgs/wy2.jpg" alt=""></div>
                <div> ElinTan</div>
                <button class="follow">FOLLOWING</button>
                <div><img class="profimg" src="../imgs/edit.png" alt=""></div>
                <div><img class="profimg" src="../imgs/cerrar.png" alt=""></div>
            </div>
            <div class="info3">
                <div  class="img" ><img class="img" src="../imgs/post2.jpg" alt=""></div>
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                    <div class="intitem"  onclick="location.href='../views/share.php'"> <img class="icon" src="../imgs/share.png" alt="" ></div>  
                </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
        </div>
    </div>
    <div class="celNavbar">
        <ul>
        <li> <a href="../views/home.php"><img src="../imgs/home.png" alt="" class="icon"></a></li>
            <li> <a href="../views/search.php"><img class="icon" src="../imgs/search.png" alt=""> </a></li>
            <button class="cel-sub" onclick="location.href='../views/submit.php'">+</button>
            <li> <a href="../views/chat.php"><img class="icon" src="../imgs/notif.png" alt=""></a></li>
            <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
        </ul>
    </div>
    <?php 
        include("modalPostEdit.php");
        include("modalDelete.php"); 
        include("../assets/js/script_submit.js");
    ?>
</body>
</html>