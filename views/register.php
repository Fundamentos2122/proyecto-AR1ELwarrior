<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/register.css">
    <title>Register</title>
</head>
<body>
    <div class="header">
        <img src="../imgs/creative-icon.png" alt="" class="img">
        <span class="title">REGISTER</span>
        <div class="texto">Get acces to a giant storage or aft, showcase, promote, sell and share your work with million of members</div>
    </div>
    <div class="container">
            <form action="../controllers/usersController.php" method="POST" autocomplete="off" class="flow" enctype="multipart/form-data">
                <div class="form-group">
                    <label for=" username" class="form-label">Create a username</label>
                <input type="text" class="form-control" name="nombre" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Add your email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Create your password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <input class="regist" type="submit" value="REGISTER"> 
            </form>
    </div>
</body>
</html>