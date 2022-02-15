<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/settings.css">
    <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>Settings</title>
</head>
<body>
<header>
        <div class="normal">
            <h1 class="title">MySocial</h1>

            <form action="" method="post" enctype="multipart/form">
            <div class="fgroup">
                <input type="search" name="" id="" placeholder="search user by name">
                <input type="submit" value="search" class="searchbtn" name="searchuser">
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
            <a href="/Projet/Social/timeline" id="active"><i class="fas fa-stream"></i></a>
            <a href="/Projet/Social/friends"><i class="fas fa-user-friends"></i></a>
            <a href="/Projet/Social/photos"><i class="fas fa-images"></i></a>
            <a href="/Projet/Social/settings"><i class="fas fa-cog"></i></a>
            <img src="<?= $user->profil ?>" alt="" class="profilepic smallpic" style="display:none">
        </nav>
        
    </header>

    <div class="container">
        
        <div class="leftbox">

            <div class="friendrequest">
                <?php if($getRequest):?>
                    <p><?= "You have ".count($getRequest)." demandes"; ?></p>
                    <hr>
                    <?php foreach($getRequest as $request):?>
                        <div class="requestbox">
                            <img src="<?= $request->profil ?>" alt="" style="width:200px">
                            <p><?= "Firstname : ".$request->firstname ?></p>
                            <p><?= "Lastname : ".$request->lastname ?></p>
                            <p><?= "Email : ".$request->email ?></p>
                            <p><?= "Since: ".$request->date ?></p>
                            <a href="/Projet/Social/settings/add<?= $request->email ?>">accept</a>
                            <a href="/Projet/Social/settings/remove<?= $request->email ?>">no</a>
                        </div>
                    <?php endforeach ?>
                <?php else:?>
                    <p>You have 0 demande</p>
                <?php endif;?>
            </div>

            <div class="friend">
            <?php if($getFriend):?>
                    <p><?= "You have ".count($getFriend)." friends"; ?></p>
                    <hr>
                    <?php foreach($getFriend as $friend):?>
                        <div class="friendbox">
                            <img src="<?= $friend->profil ?>" alt="" style="width:200px">
                            <p><?= "Firstname : ".$friend->firstname ?></p>
                            <p><?= "Lastname : ".$friend->lastname ?></p>
                            <p><?= "Email : ".$friend->email ?></p>
                            
                        </div>
                        
                    <?php endforeach ?>
                <?php else:?>
                    <p>You have 0 friend</p>
                <?php endif;?>
            </div>

        </div>

        <div class="rightbox">

            <div class="picture"></div>

            <div class="params"></div>

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

    document.querySelector('.textfield').focus();
</script>
</html>