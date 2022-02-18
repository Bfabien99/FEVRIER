<?php
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: Roboto, arial, helvetica, sans-serif;
        }
        body{
            height: 100vh;
            background-color: #5C9DF8;
        }
        .container{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box{
            margin:auto;
            background-color: rgba(255,255,255,0.94);
            display: flex;
            flex-direction: column;
            gap: 0.1em;
            border-radius:3px 10px;
            box-shadow: 1px 0px 5px rgba(210,210,210,0.8);
            width: 80%;
        }

        h1{
            background-color: #5C23E1;
            color: #fff;
            text-shadow: 1px 0px 5px rgba(0,0,0,1);
            text-align: center;
            padding: 0.5em;

        }

        form{
            padding: 1em;
            display: flex;
            flex-direction: column;
            gap: 0.5em;
        }

        .group{
            padding: 1em;
            display: flex;
            flex-direction: column;
            gap: 0.5em;
        }

        .group label{
            color: #5C23E1;
            font-weight: bolder;
        }

        .group input
        {
            width: 100%;
            height: 30px;
            border: 1px solid rgba(150, 150, 150,0.8);
            outline: none;
            padding: 0.2em;
        }

        .group input:focus
        {
            border: 1px solid #5C23E1;
        }

        input[type="submit"]
        {
            border: none;
            background: #5D5DFF;
            color: #FFFFFF;
            outline: none;
            cursor: pointer;
            width: 50%;
            margin:auto;
            height:30px;
        }

        input[type="submit"]:hover{
            background:#5C9DF8;
            transition: all 0.2s;
        }

        a{
            background:#5C23E1;
            color: #fff;
            border-radius: 3px;
            padding:0.3em 1em;
            height:20px;
            display: inline-block;
            text-decoration: none;
            margin: auto;
            width: fit-content;
        }

        a:hover{
            background-color:#5D5DFF;
            box-shadow: 1px 1px 10px rgba(0,0,0,0.4);
            transition: all 0.2s;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h1>Reset Password</h1>
            <?php if(!empty($user)):?>
                    <?= "<h4 style='color:#5C9111;text-align:center;'>".$user->firstname." ".$user->lastname."</h4>"?>
            <?php endif;?>
            <form action="" method="post" enctype="multipart/form">
                <div class="group">
                    <label for="npassword">New Password</label>
                    <input type="password" name="npassword">
                </div>

                <div class="group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword">
                </div>
                <?php if(!empty($msg)):?>
                    <?= "<p style='color:red;'>".$msg."</p>"?>
                <?php endif;?>
                <input type="submit" value="OK" name="setpass">
            </form>
        </div>
        <a href="/Projet/Social/">Cancel</a>
    </div>
</body>
</html>