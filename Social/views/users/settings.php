<?php
    $initusers = new Userscontroller();
    $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
?>
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
                        <li><a href="#" class="droplink">Settings</a></li>
                        <li><a href="/Projet/Social/logout" class="droplink">Log out</a></li> 
                    </ul>
            </div>

        </div>

        <nav class="small">
            <a href="/Projet/Social/timeline" title="timeline"><i class="fas fa-stream"></i></a>
            <a href="/Projet/Social/friends" title="friends"><i class="fas fa-user-friends"></i></a>
            <a href="/Projet/Social/photos" title="pictures"><i class="fas fa-images"></i></a>
            <a href="#" id="active" title="settings"><i class="fas fa-cog"></i></a>
            <a href="/Projet/Social/logout" id="logout" title="logout"><i class="fas fa-times"></i></a>
        </nav>
        
    </header>

    <div class="container">

        <div class="menu">
            <h2>Menu</h2>
            <nav>
                <ul>
                    <li><i class="fas fa-stream"></i><a href="/Projet/Social/timeline">Timeline</a></li>
                    <li><i class="fas fa-user-friends"></i><a href="/Projet/Social/friends">Friends</a></li>
                    <li><i class="fas fa-images"></i><a href="/Projet/Social/photos">Photos</a></li>                                          
                </ul>
            </nav>
        </div>
        
        <div class="content">
            <div class="topbox">

                <div class="friendrequest">
                    <?php if($getRequest):?>
                        <p><?= "You have ".count($getRequest)." demandes"; ?></p>
                        <hr>
                        <div class="requestbox">
                        <?php foreach($getRequest as $request):?>
                            <div class="request">
                                <img src="<?= $request->profil ?>" alt="" style="width:200px">
                                <p><?= "Firstname : ".$request->firstname ?></p>
                                <p><?= "Lastname : ".$request->lastname ?></p>
                                <p><?= "Email : ".$request->email ?></p>
                                <p><?= "Since: ".$request->date ?></p>
                                <a href="/Projet/Social/settings/add<?= $request->email ?>">accept</a>
                                <a href="/Projet/Social/settings/remove<?= $request->email ?>">no</a>
                            </div>
                        <?php endforeach ?>
                        </div>
                    <?php else:?>
                        <p>You have 0 demande</p>
                    <?php endif;?>
                </div>

                <div class="friendbox">
                    <?php if($getFriend):?>
                        <p><?= "You have ".count($getFriend)." friends"; ?></p>
                        <hr>
                        <div class="allfriend">
                        <?php foreach($getFriend as $friend):?>
                            <div class="friend">
                                <img src="<?= $friend->profil ?>" alt="" style="width:200px">
                                <p><?= "Firstname : ".$friend->firstname ?></p>
                                <p><?= "Lastname : ".$friend->lastname ?></p>
                                <p><?= "Email : ".$friend->email ?></p>
                                
                            </div>
                        <?php endforeach ?>
                        </div>
                    <?php else:?>
                        <p>You have 0 friend</p>
                    <?php endif;?>
                </div>

            </div>

            <div class="bottombox">

                <div class="picturebox">
                <?php if($pictures):?>
                    <p><?= "You have ".count($pictures)." picture"; ?></p>
                    <div class="allpicture">
                    <?php foreach($pictures as $image):?>
                    <div class="picture">
                        <img src="<?= $image->image?>" class="userpic">
                        <div class="bottom">
                            <p class="posted"><?= $image->posted_at?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                <?php else:?>
                        <p>You have 0 picture</p>
                <?php endif;?>
                </div>

                <div class="params">
                    <h3>Update informations</h3>
                    <form action="" method="post" enctype="multipart/form-data" class="updateform">
        
                        <div class="imgbox">
                            <div class="imgpostbox">
                                <input type="file" name="imgpost" accept="image/png,  image/jpeg" class="file">
                            </div>
                            <span class="uploadtext">Upload picture</span>
                        </div>
            
                        <div class="ufgroup">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname"  value="<?= $user->firstname ?>">
                        </div>
                        <div class="ufgroup">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname"  value="<?= $user->lastname ?>">
                        </div>
                        <div class="ufgroup">
                            <label for="email">Email</label>
                            <input type="text" name="email"  value="<?= $user->email ?>">
                        </div>
                        <div class="ufgroup">
                            <label for="newpassword">New password</label>
                            <input type="password" name="npassword">
                        </div>
                        <div class="ufgroup">
                            <label for="cpassword">Confirm password</label>
                            <input type="password" name="cpassword">
                        </div>
                        <?php if(!empty($msg)):?>
                            <?= "<p>".$msg."</p>"?>
                        <?php endif;?>
                        <input type="submit" value="update" name="update">
                    </form>
                </div>

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
<script>
let file = document.querySelector('.file');
const div1 = document.createElement('div');
div1.classList.add('display_image');
const btnclose = document.createElement('button');
btnclose.classList.add('btnclose');
let img = document.querySelector('.imgbox');
let text = document.querySelector('.uploadtext');

file.addEventListener('change',function(){
    img.append(div1);
    div1.append(btnclose);
    btnclose.addEventListener("click",function(e){
        e.preventDefault();
        div1.style.backgroundImage="";
        div1.remove();
        text.textContent="Upload picture"
    })
    const reader = new FileReader();
    reader.addEventListener("load",() =>{
       uploaded_image = reader.result;
       document.querySelector(".display_image").style.backgroundImage= `url(${uploaded_image})`;
       text.textContent="Change picture"

    });
    reader.readAsDataURL(this.files[0]);
})
</script>
</html>