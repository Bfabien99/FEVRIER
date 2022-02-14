<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h2>LogIn</h2><h2>Mysocial</h2>
    </header>
    <div class="container">
        <div class="content">
            <h2>Login Form</h2>
            <form method="post" enctype="multipart/form">

                <div class="group">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Your@email.mail">
                </div>

                <div class="group">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="password">
                </div>

                <button type="submit" name="login" >Login</button>

            </form>

            <div class="sign">
                <a href="/Projet/Social/forget" class="forget">Forget you password ?</a>
                <a href="/Projet/Social/signup" class="signup">SignUp</a>
            </div>
        </div>
    </div>
</body>
</html>