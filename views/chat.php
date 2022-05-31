<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/chat.css">
    <title>Chat</title>
</head>
<body>
    <div class="pcNavbar">
        <ul>
        
                <li> <a href="../views/home.php"><img class="icon" src="../imgs/creative-icon.png" alt=""> CreativeFolio</a></li>
                <li> <a href="../views/search.php"><img class="icon" src="../imgs/search.png" alt=""></a><input type="search" class="search" placeholder="Search..."> </li>
                <li> <a href="../views/perfil.php"><img class="icon" src="../imgs/user.png" alt=""></a></li>
                <button class="sub" onclick="location.href='../views/submit.php'">SUBMIT</button>
        </ul>
        <div class="minimenu">
            <button class="micon" onclick="location.href='../views/chat.php'"> CHAT </button>
            <button class="micon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <form action="../controllers/accessControler.php" method="POST" class="logout-icon">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="i1icon" value="LOG OUT">
        </form>
        </div>
    </div> 

    <div class="view">
        <div class="celheader">
            <ul>
                
                <div class="titulo">CHAT</div>
            </ul>
        </div>
        <div class="info12">
            <button class="i1icon" onclick="location.href='../views/home.php'"> HOME </button>
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
    </div>


    <div class="container">

        <div class="chatview">
            <div class="miniheader">
                <div> Comments </div>
                <div><img src="" alt=""></div>
            </div>
            <div class="options">
                <button class="i1icon"> General </button>
                <button class="i1icon"> Request </button>
                <button class="i1icon"> Notes </button>
            </div>
            <div class="mensages">

                    <div class="intitem"> <img class="icon" src="../imgs/pimg.jpg" alt=""> Mensaje de Alan54: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum fuga corrupti nemo facere minus ab! Enim, numquam? Dolor aut ipsum maiores illo neque impedit veniam. Dicta hic minus ipsam commodi.</div>
                    <div class="intitem"> <img class="icon" src="../imgs/wy.jpg" alt=""> Mensaje de MRdrawer: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo cum, voluptate quos voluptatem quas aut nam aperiam dolore mollitia illum adipisci perspiciatis sapiente. Adipisci commodi veniam quo placeat reprehenderit tenetur.</div>
                    <div class="intitem"> <img class="icon" src="../imgs/pimg.jpg" alt=""> Mensaje de Epicgirl9: Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem aperiam asperiores nobis quaerat doloremque? Cum magnam dolore velit assumenda quo impedit sit dolor. Ex recusandae esse consequatur impedit, pariatur laborum?</div>                 
                </div>
        </div>

        <div class="fullchat">
            <div class="vieitem"> <img class="icon" src="../imgs/wy.jpg" alt="">  MRdrawer</div>
            <div class="dialogo"> Mensaje de MRdrawer : Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem vel nostrum tempore nam laboriosam facilis atque, excepturi praesentium distinctio tenetur quibusdam, ullam maiores quidem! Ad, ipsam obcaecati! Quae, facilis temporibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus a fugit officia, voluptate, laboriosam at rem quia non delectus consequuntur eveniet id consequatur vitae quaerat inventore nesciunt omnis tempora qui? </div>
            <div class="respuesta"> Mensaje de AWarrior : Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem vel nostrum tempore nam laboriosam facilis atque, excepturi praesentium distinctio tenetur quibusdam, ullam maiores quidem! Ad, ipsam obcaecati! Quae, facilis temporibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus a fugit officia, voluptate, laboriosam at rem quia non delectus consequuntur eveniet id consequatur vitae quaerat inventore nesciunt omnis tempora qui? </div>
            <div class="dialogo"> Mensaje de MRdrawer : Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem vel nostrum tempore nam laboriosam facilis atque, excepturi praesentium distinctio tenetur quibusdam, ullam maiores quidem! Ad, ipsam obcaecati! Quae, facilis temporibus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus a fugit officia, voluptate, laboriosam at rem quia non delectus consequuntur eveniet id consequatur vitae quaerat inventore nesciunt omnis tempora qui?  </div>
            <input class="response" type="text" placeholder="Add a response"></input>
        </div>
    </div>
</body>
</html>