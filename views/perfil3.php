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
    <div class="pcNavbar">
        <ul>
        
                <li> <a href="../views/home.php"><img class="icon" src="../imgs/creative-icon.png" alt=""> CreativeFolio</a></li>
                <li> <a href="../views/search.php"><img class="icon" src="../imgs/search.png" alt=""></a><input type="search" class="search" placeholder="Search..."> </li>
                <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
                <button class="sub" onclick="location.href='../views/submit.php'">SUBMIT</button>
        </ul>
        <div class="info12">
            <button class="i1icon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>          
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
            <div class="data1">
                <div><img class="imgprofile" src="../imgs/pimg.PNG" alt=""></div>
            <div>RAMDOM95</div>
            <div>Account: Normal</div>
            </div>

            <div class="data2">
            <div>Watchers: 50</div>
            <div>Watching: 120</div>
            <div>Art:25</div>
            </div>

            <button class="edit" onclick="location.href='../views/editprofile.php'">EDIT PROFILE</button>
            
        </div>

        <div class="opciones">
        <button class="i1icon" onclick="location.href='../views/perfil.php'"> GALLERY </button>
                <button class="i1icon" onclick="location.href='../views/perfil2.php'"> FAVOURITES </button>
                <button class="i1icon" onclick="location.href='../views/perfil3.php'"> POSTS </button>
                <button class="i1icon" onclick="location.href='../views/perfil4.php'"> SUSCRIPTION </button>
        </div>

        <div class="info2">
            <div class="intitem"> <img class="icon" src="../imgs/pimg.PNG" alt=""> Mensaje de Alan54: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum fuga corrupti nemo facere minus ab! Enim, numquam? Dolor aut ipsum maiores illo neque impedit veniam. Dicta hic minus ipsam commodi.</div>

            </div>
            <div class="info3">
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

            </div>
            <div class="info2">
            <div class="intitem"> <img class="icon" src="../imgs/wy.jpg" alt=""> Mensaje de MRdrawer: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo cum, voluptate quos voluptatem quas aut nam aperiam dolore mollitia illum adipisci perspiciatis sapiente. Adipisci commodi veniam quo placeat reprehenderit tenetur.</div>
        
            </div>
            <div class="info3">
                <div class="interact">
                    <div class="intitem"> <img class="icon" src="../imgs/like.png" alt=""></div>
                    <div class="intitem"> <img class="icon" src="../imgs/comment.png" alt=""></div>
                </div>
                <input class="comment" type="text" placeholder="Add a comment"> </input>

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
</body>
</html>