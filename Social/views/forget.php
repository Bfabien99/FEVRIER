<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/forget.css">
    <title>Forget</title>
</head>
<body>
    <header>
        <h2>Forget</h2><h2>Mysocial</h2>
    </header>
    <div class="container">
        <div class="main">
            <h2>Forget</h2>
            <form action="" method="post" enctype="multipart/form">
                <h4 style="color: #5C9DF8;">Your email and firstname have to be the same like your user firstname and email in mysocial</h4>
                <div class="group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" placeholder="Ex: Brou">
                </div>

                <div class="group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Ex: mail@mail.me">
                </div>
                <?php if(!empty($msg)):?>
                    <?= "<p style='color:red;'>".$msg."</p>"?>
                <?php endif;?>
                <button class="reset" type="submit" name="submit">Reset</button>
            </form>
            <a href="/Projet/Social/" class="back">Go back</a>
        </div>
        
    </div>
</body>
</html>