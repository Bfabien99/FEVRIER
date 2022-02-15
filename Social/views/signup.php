<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/signup.css">
    <title>Signup</title>
</head>
<body>
    <header>
        <h2>SignUp</h2><h2>Mysocial</h2>
    </header>
    <div class="container">
        <div class="main">
            <h2>SignUp Form</h2>
            <form action="" method="post" enctype="multipart/form">
                <div class="group">
                    <div class="gchild">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" placeholder="Ex: Brou">
                    </div>
                    <div class="gchild">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" placeholder="Ex: Kouadio Fabien">
                    </div>
                </div>

                <div class="group">
                    <div class="gchild">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" placeholder="Ex: (00225) 0102030405">
                    </div>
                    <div class="gchild">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Ex: mail@mail.me">
                    </div>
                </div>

                <div class="group">
                    <div class="gchild">
                        <label for="birth">Date of birth</label>
                        <input type="date" name="birth" max="2006-12-31">
                    </div>
                    <div class="gchild">
                        <label for="gender">Gender</label>
                        <div class="radiobox">
                            <label for="male"><input type="radio" name="gender" value="male"> Male</label>
                            <label for="female"><input type="radio" name="gender" value="female"> Female</label> 
                        </div>                      
                    </div>
                </div>

                <div class="group">
                    <div class="gchild">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Ex: password">
                    </div>
                    <div class="gchild">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Ex: password">
                    </div>
                </div>
                <?php if (!empty($msg)){echo "<p style ='text-align: center;color:red;font-weight:bolder;background-color:white;'>$msg</p>";} ?>
                <button type="submit" class="signup" name="signup">SignUp</button>
            </form>
        </div>

        <p>If you have an Account, just <a href="/Projet/Social/" class="login">Login</a></p>
    </div>
</body>
<script src="assets/script/model.js"></script>
</html>