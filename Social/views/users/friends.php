<?php
    $initusers = new Usersmodel();
    $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/friends.css">
    <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>Friends</title>
</head>
<body>

    <header>
        <div class="normal">
            <h1 class="title">MySocial</h1>

            <form action="">
            <div class="fgroup">
                <input type="search" name="" id="" placeholder="search user by name">
                <input type="submit" value="search" class="searchbtn">
            </div>
            </form>

            <div id="dropmenu" style="position:relative;">
                <img src="<?= $user->profil ?>" alt="" class="profilepic listshow">
                    <ul class="picturemenu" style="list-style:none;position:absolute;display:none;">
                    <li><a href="/Projet/Social/settings" class="droplink">Settings</a></li>
                        <li><a href="/Projet/Social/logout" class="droplink">Log out</a></li> 
                    </ul>
            </div>

        </div>

        <nav class="small">
            <a href="/Projet/Social/timeline"><i class="fas fa-stream"></i></a>
            <a href="#" id="active"><i class="fas fa-user-friends"></i></a>
            <a href="/Projet/Social/photos"><i class="fas fa-images"></i></a>
            <a href="/Projet/Social/settings"><i class="fas fa-cog"></i></a>
            <a href="/Projet/Social/logout" id="logout" title="logout"><i class="fas fa-times"></i></a>
        </nav>
        
    </header>

    <div class="container">

        <div class="menu">
            <h2>Menu</h2>
            <nav>
                <ul>
                    <li><i class="fas fa-stream"></i><a href="/Projet/Social/timeline">Timeline</a></li>
                    <li class="active"><i class="fas fa-user-friends"></i><a href="#">Friends</a></li>
                    <li><i class="fas fa-images"></i><a href="/Projet/Social/photos">Photos</a></li>                                        
                </ul>
            </nav>
        </div>

        <div class="content">
            <?php if($getFriend):?>
            <h3 class="friendcount"><?= "You have ".count($getFriend)." friends"; ?></h3>
            <?php else:?>
                <h3 class="friendcount">0 friend</h3>
            <?php endif;?>
            <hr>
            <div class="userbox">
            <?php if($getFriend):?>
            <?php foreach($getFriend as $friend):?>
                <div class="friend">
                    <img src="<?= $friend->profil ?>" alt="" class="friendimg">
                    <p class="friendname"><?= $friend->firstname." ".$friend->lastname ?></p>
                    <p class="friendemail"><?= $friend->email ?></p>
                    <a href="/Projet/Social/profil/<?= md5($friend->email)."".($friend->user_id)?>" class="btnshow">See profil</a>
                </div>
            <?php endforeach; ?>
            </div>
            <?php endif;?>

        </div>

    </div>

</body>
<script>
    let drop = document.querySelector('.listshow')
    let list = document.querySelector('.picturemenu')

    drop.addEventListener('mouseover', function(){
        list.style.display = 'flex'
    })
    drop.addEventListener('mouseleave', function(){
        list.style.display = 'none'
    })
    list.addEventListener('mouseover', function(){
        list.style.display = 'flex'
    })
    list.addEventListener('mouseleave', function(){
        list.style.display = 'none'
    })
</script>
</html>