<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Log in</title>
</head>
<body>
    <div class="header">
        <img src="../imgs/creative-icon.png" alt="" class="img">
        <span class="title">LOGIN</span>
    </div>
    <div class="container">
            <form action="../controllers/accessControler.php" method="POST" autocomplete="off" class="flow" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="POST">
            <div class="form-group">
                    <label for=" username" class="form-label">USERNAME</label>
                <input type="text" class="form-control" name="nombre" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">EMAIL</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="keepme">
                    <input type="checkbox" class="form-keep" name="keep"  required>
                    <label for=" keep" class="form-labelkeep">Keep me Login</label>
                </div>
                <a class="forgot" href="">Forgot your password?</a>
        <input type="submit" value="LOG IN"> 
            </form>
    </div>
</body>
</html>