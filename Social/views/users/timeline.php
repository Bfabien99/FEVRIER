<?php
    $initusers = new Userscontroller();
    $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
    
    $initposts = new Postscontroller();
    $posts = $initposts->getPost(); 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/timeline.css">
    <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <script src="assets/script/jquery-3.6.0.min.js"></script>
    <title>Timeline</title>
</head>
<body>

    <header>
        <div class="normal">
            <h1 class="title">MySocial</h1>

            <form action="" method="post" enctype="multipart/form" style="position:relative;" autocomplete="off">
            <div class="fgroup">
                <input type="search" name="search" id="search" placeholder="search user by name">
                <input type="submit" value="search" class="searchbtn" name="searchuser">
                <div style="position: absolute; top:30px;" id="searchresult"></div>
            </div>
            </form>
            
            <div id="dropmenu" style="position:relative;">
                <img src="<?= $user->profil ?>" alt="" class="profilepic listshow" >
                    <ul class="picturemenu" style="list-style:none;position:absolute;display:none;">
                        <li><a href="/Projet/Social/settings" class="droplink">Settings</a></li>
                        <li><a href="/Projet/Social/logout" class="droplink">Log out</a></li> 
                    </ul>
            </div>
            

        </div>

        <nav class="small">
            <a href="#" id="active" title="timeline"><i class="fas fa-stream"></i></a>
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
                    <li class="active"><i class="fas fa-stream"></i><a href="#">Timeline</a></li>
                    <li><i class="fas fa-user-friends"></i><a href="/Projet/Social/friends">Friends</a></li>
                    <li><i class="fas fa-images"></i><a href="/Projet/Social/photos">Photos</a></li>                                          
                </ul>
            </nav>
        </div>

        <div class="content">

            <form action="" class="postfield" method="post" enctype="multipart/form-data">
                <h3 >Want to post something ?</h3>
                <?php if (!empty($msg)){echo "<p style ='text-align: center;color:red;font-weight:bolder;'>$msg</p>";} ?>
                <textarea name="textpost" id="" cols="30" rows="10" placeholder="write something..."></textarea>
                <div class="imgbox">
                <div class="imgpostbox">
                    <input type="file" name="imgpost" accept="image/png,  image/jpeg" class="file">
                </div>
                    <span class="uploadtext">Upload picture</span>
                </div>
                
                <input type="submit" value="Post" class="postbtn" name="post">
            </form>

            <?php if($posts):?>
                <hr name="post">
                <?php foreach($posts as $post):?>

                    <div class="userpost">
                        <?php 
                            $initposts = new Postscontroller();
                            $numbercomments = $initposts->getComment($post->id);
                            $numberlikes = $initposts->getLike($post->id);
                            $alreadyLike = $initposts->alreadyLike($user->id,$post->id);
                        ?>
                        <?php if($post->email == $user->email):?>
                        <div class="profilpic">
                            <img src="<?= $post->profil ?>" alt="" class="profilepic">
                            <div class="group">
                                <a href="/Projet/Social/settings" class="namelink"><?= $post->firstname." ".$post->lastname ?></a>
                                <p><?= $post->posted_at?></p>
                            </div>
                        </div>
                        <?php else:?>
                            <div class="profilpic">
                            <img src="<?= $post->profil ?>" alt="" class="profilepic">
                            <div class="group">
                                <a href="/Projet/Social/profil/<?= md5($post->email)."".($post->user_id)?>" class="namelink"><?= $post->firstname." ".$post->lastname ?></a>
                                <p><?= $post->posted_at?></p>
                            </div>
                        </div>
                        <?php endif?>

                        <div class="post">
                            <?php if($post->text !== null):?>
                                <p><?= $post->text?></p>
                            <?php endif;?>
                            <?php if($post->image !== null):?>
                                <img src="<?= $post->image?>" alt="">
                            <?php endif;?>
                        </div>
                        <div class="action">
                                <?php if($alreadyLike):?>
                                    <a href="#" class="like" id="alreadylike"><i class="fas fa-thumbs-up"></i>I like <?= (!$numberlikes) ? "0": count($numberlikes); ?></a>
                                <?php else:?>
                                <a href="/Projet/Social/like/<?= $post->id?>" class="like notyet"><i class="fas fa-thumbs-up"></i>I like <?= (!$numberlikes) ? "0": count($numberlikes); ?></a>
                                <?php endif;?>
                                <a href="/Projet/Social/comment/<?= $post->id?>" class="btncomment">
                                <i class="fas fa-comment"></i>Comment <?= (!$numbercomments) ? "0": count($numbercomments); ?></a>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php endif;?>

            
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
</script>
<script>
    $('#search').keyup(function(){
        var search_term = $('#search').val();
        $.ajax({

            type: "POST",

            url: 'views/users/search.php',

            data: {search: search_term },

            success: function(response)
            {
                
                $('#searchresult').html('');
                var jsonData = JSON.parse(response);
                $.each(jsonData, function (key, value) {
                    $('#searchresult').append('<p>'+value.firstname+" "+value.lastname+'</p>');
                });
            }

        });

    });
</script>
</html>