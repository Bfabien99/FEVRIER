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
    <link rel="stylesheet" href="assets/css/photos.css">
    <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>Photos</title>
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
                        <li><a href="/Projet/Social/profil/<?= md5($user->email)."".($user->id)?>" class="droplink">Profil</a></li>
                        <li><a href="/Projet/Social/logout" class="droplink">Log out</a></li> 
                    </ul>
            </div>

        </div>

        <nav class="small">
        <a href="/Projet/Social/timeline"><i class="fas fa-stream"></i></a>
            <a href="/Projet/Social/friends"><i class="fas fa-user-friends"></i></a>
            <a href="#" id="active"><i class="fas fa-images"></i></a>
            <a href="/Projet/Social/settings"><i class="fas fa-cog"></i></a>
            <img src="assets/image/user/profile/male.png" alt="" class="profilepic smallpic" style="display:none">
        </nav>
        
    </header>
    

    <div class="container">

        <div class="menu">
            <h2>Menu</h2>
            <nav>
                <ul>
                    <li><i class="fas fa-stream"></i><a href="/Projet/Social/timeline">Timeline</a></li>
                    <li><i class="fas fa-user-friends"></i><a href="/Projet/Social/friends">Friends</a></li>
                    <li class="active"><i class="fas fa-images"></i><a href="#">Photos</a></li>
                    <li><i class="fas fa-cog"></i><a href="/Projet/Social/settings">Settings</a></li>                                           
                </ul>
            </nav>
        </div>

        <div class="content">

            <h3 class="picturecount"><?= !empty($pictures) ? count($pictures): 0; ?> Pictures</h3>
            <hr>
            <div class="picturebox">

                <?php if($pictures):?>
                    <?php foreach($pictures as $image):?>
                    <div class="picture">
                        <img src="<?= $image->image?>" alt="">
                        <div class="bottom">
                            <p class="posted"><?= $image->posted_at?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif;?>

            </div>

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