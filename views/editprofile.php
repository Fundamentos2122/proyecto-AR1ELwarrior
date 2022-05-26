<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/editprofile.css">
    <title>Edit</title>
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
                
                <div class="titulo">EDIT PROFILE</div>
                <li> <a href="../views/chat.php"><img class="icon" src="../imgs/chat.png" alt=""></a></li>
            </ul>
        </div>
        <div class="info12">
            <button class="i1icon" onclick="location.href='../views/home.php'"> HOME </button>
            <button class="i1icon" onclick="location.href='../views/about.php'"> AYUDA </button>
            <button class="i1icon" onclick="location.href='../index.html'"> LOG OUT </button>
        </div>
    </div>


    <div class="container">

        <div class="pclist">
            <div class="miniheader">
                <div> Profile Settings </div>
            </div>
            <div class="l1">
                <div class="minititle">Personal info</div>
                <div class="datos">Username</div>
                <div class="datos">Email</div>
                <div class="datos">Password</div>
            </div>
            <div class="l2">
                <div class="minititle">Notifications</div>
                <div class="datos">Notes</div>
                <div class="datos">Comments</div>
                <div class="datos">New Followers</div>
            </div>
            <div class="l3">
                <div class="minititle">Legal Stuff</div>
                <div class="datos">Terms and conditions</div>
                <div class="datos">Help and Faqs</div>
            </div>
        </div>

        <div class="info">
            <div class="personal">
                <div class="minititle"> General information</div>
                <form>
                    <div class="form-group">
                        <label for=" username" class="form-label">USERNAME</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for=" date" class="form-label">DATE OF BIRTH</label>
                    <input type="date" class="form-control" name="date"  autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="mail" class="form-label">EMAIL</label>
                    <input type="email" class="form-control" name="mail" placeholder="Password" required>
                    </div>
                    <div class="notif">
                        <input type="checkbox" class="form-keep" name="keep"  required>
                        <label for=" notif" class="form-labelkeep">Email notificacions</label>
                    </div>
                </form>
                <input type="submit" value="SAVE"> 
            </div>
            <div class="contra">
                <div class="minititle"> Change password</div>
                <form>
                    <div class="form-group">
                        <label for=" old" class="form-label">OLD PASSWORD</label>
                    <input type="password" class="form-control" name="old" placeholder="Old password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for=" new" class="form-label">NEW PASSWORD</label>
                    <input type="password" class="form-control" name="new" placeholder="New password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for=" confirm" class="form-label">CONFIRM PASSWORD</label>
                    <input type="password" class="form-control" name="confirm" placeholder="Confirm" autocomplete="off" required>
                    </div>
                </form>
                <input type="submit" value="SAVE"> 
            </div>


        </div>
    </div>
</body>
</html>