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
    <link rel="stylesheet" href="../assets/css/comment.css">
    <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>Comment</title>
</head>
<body>

    <header>
        <div class="normal">
            <h1 class="title">MySocial</h1>

            <div id="dropmenu" style="position:relative;">
                <img src="<?= "../".$user->profil ?>" alt="" class="profilepic listshow">
                    <ul class="picturemenu" style="list-style:none;position:absolute;display:none;">
                    <li><a href="/Projet/Social/settings" class="droplink">Settings</a></li>
                        <li><a href="/Projet/Social/logout" class="droplink">Log out</a></li> 
                    </ul>
            </div>

        </div>

        <nav class="small">
        <a href="/Projet/Social/timeline" title="timeline"><i class="fas fa-stream"></i></a>
            <a href="/Projet/Social/friends" title="friends"><i class="fas fa-user-friends"></i></a>
            <a href="/Projet/Social/photos" title="pictures"><i class="fas fa-images"></i></a>
            <a href="/Projet/Social/settings" title="settings"><i class="fas fa-cog"></i></a>
            <a href="/Projet/Social/logout" id="logout" title="logout"><i class="fas fa-times"></i></a>
        </nav>
        
    </header>

    <div class="container">

        <div class="menu">
            <h2>Menu</h2>
            <nav>
                <ul>
                    <li class="active"><i class="fas fa-stream"></i><a href="/Projet/Social/timeline">Timeline</a></li>
                    <li><i class="fas fa-user-friends"></i><a href="/Projet/Social/friends">Friends</a></li>
                    <li><i class="fas fa-images"></i><a href="/Projet/Social/photos">Photos</a></li>                                      
                </ul>
            </nav>
        </div>

        <div class="content">


            
                <div class="userpost">

                    <div class="profilpic">
                        <img src="<?= "../".$post->profil ?>" alt="" class="profilepic">
                        <div class="group">
                            <p class="namelink"><?= $post->firstname." ".$post->lastname ?></p>
                            <p><?= $post->posted_at?></p>
                        </div>
                    </div>

                    <div class="post">
                        <p><?= $post->text?></p>
                        <?php if($post->image !== null):?>
                        <img src="../<?= $post->image?>" alt="">
                        <?php endif;?>
                    </div>
                    <div class="action">
                    <?php if($alreadyLike):?>
                                <a href="#" class="like" id="alreadylike"><i class="fas fa-thumbs-up"></i>I like <?= (!$numberlikes) ? "0": count($numberlikes); ?></a>
                            <?php else:?>
                            <a href="/Projet/Social/like/<?= $post->id?>" class="like notyet"><i class="fas fa-thumbs-up"></i>I like <?= (!$numberlikes) ? "0": count($numberlikes); ?></a>
                            <?php endif;?>
                            <a href="/Projet/Social/comment/<?= $post->id?>" class="btncomment">
                            <i class="fas fa-comment"></i>Comment <?= (!$comments) ? "0": count($comments); ?></a>
                    </div>
                </div>
                <?php if($comments):?>
                    <hr>
                    <?php foreach($comments as $comment):?>

                        <div class="commentbox">

                            <div class="profilpic">

                                <img src="<?= "../".$comment->profil ?>" alt="" class="profilepic">
                                <div class="group">
                                    <p class="namelink"><?= $comment->firstname." ".$comment->lastname ?></p>
                                    <?=$comment->commented_at?>
                                </div>

                            </div>
        
                            <p class="textbox"><?=nl2br($comment->text)?></p>
                            
                        </div>

                        <hr>
                    <?php endforeach;?>
                <?php endif;?>
                <?php if (!empty($msg)){echo "<p style ='text-align: center;color:red;font-weight:bolder;'>$msg</p>";} ?>
                <form action="" class="postfield" method="post" enctype="multipart/form">
                <textarea name="textpost" class="textfield" cols="30" rows="10" placeholder="write comment..."></textarea>
                <input type="submit" value="Post" class="postbtn" name="post">
                </form>


            
        </div>

    </div>

</body>
<script src="assets/script/user.js"></script>
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

    document.querySelector('.textfield').focus();
</script>
</html>