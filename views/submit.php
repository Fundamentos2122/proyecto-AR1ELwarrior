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
    <div class="headercontent">
        <div class="pcNavbar">
            <ul>
                
                <li> <a href="../views/home.php"><img class="icon" src="../imgs/creative-icon.png" alt=""> CreativeFolio</a></li>
                <li> <a href="../views/search.php"><img class="icon" src="../imgs/search.png" alt=""></a><input type="search" class="search" placeholder="Search..."> </li>
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
            <button class="micon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>

        </div>

        <div class="sub-container">
            <div class="submit">
                <div class="subblock">SELECT A FILE OR DRAG THE FILE TO SUBMIT <br><br> <input type="file" class="art" name="art" ></div>
                <input class="desc" type="text" placeholder="Add a description or a comment"> </input>
                <div class="interact">
                <button class="btn">SAVE</button>
                <button class="btn">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="celNavbar">
        <ul>
            <li> <a href="../views/home.php"><img src="../imgs/home.png" alt="" class="icon"></a></li>
            <li> <a href="../views/search.php"><img class="icon" src="../imgs/search.png" alt=""> </a></li>
            <button class="cel-sub">+</button>
            <li> <a href="../views/chat.php"><img class="icon" src="../imgs/notif.png" alt=""></a></li>
            <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
        </ul>
    </div>

</body>
</html>