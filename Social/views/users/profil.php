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
        

html{
    scroll-behavior: smooth;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: auto 1fr;
    min-height: 100vh;
    background-color: #f6f6fc;
    grid-gap:1em;
}

header{
    grid-column-start: 1;
    grid-column-end: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    width: 100%;
    position: sticky;
    top: 0;
    z-index: 2;
}

.normal{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
    background-color: #5d2fdbfc;
    padding: 1em;
}

#dropmenu{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0.5em;
}

.picturemenu{
    background: #fff !important;
    min-width:120px;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 1px 1px 10px #eee;
    align-items: center;
    bottom: -70px;
    gap: 1em;
    padding: 1em 0.5em;
}

.droplink{
    text-decoration: none;
    color: #047af7;
}

.droplink:hover{
    color:#ee4f4f;
}

.small{
    display: none;
    box-shadow: 1px 1px 10px rgba(228, 228, 228, 0.719);
}

.title{
    color: #fff;
    text-shadow: 0px 3px 5px rgb(29, 29, 29);
    text-align: center;
    font-size: 2rem;
}

.fgroup input{
    padding: 5px;
    height: 30px;
    border: none;
    border-radius: 5px;
    outline: none;
}

input[type="search"]{
    min-width: 250px;
}

.searchbtn{
    color: white;
    background: #047af7;
}

.searchbtn:hover{
    transition: all 0.1s ease-in;
    background: #f4312e;
    cursor: pointer;
}

.profilepic{
    border-radius: 50%;
    width: 50px;
    height: 50px;
    background-color: white;
    border: 2px solid #047af7;
    padding: 2px;
}

.profilinfo {
            width: 90%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content:center;
            margin: auto;
        }

.profilpic{
            width:fit-content ;
            margin: auto;
            overflow: hidden;
        }

.profilpic img{
            width:100% ;
            max-width:500px;
            box-shadow: 0px 0px 5px lightgrey;
            border-radius: 20px;
        }

.profilpic img:hover{
    transform: scale(1.1);
    transition: all 0.2s;
}

@media screen and (max-width:900px){
    .small{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        padding:0.5em;
        background-color: rgb(255, 255, 255);
    }

    .small a{
        text-decoration: none;
        justify-content: center;
        padding: 0.5em;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        border-radius: 50%;
        background: #ffffff;
        box-shadow: 1px 1px 10px #e8e8e889;
    }

    .small a .fas{
        color: #047af7;
    }

    .small a:hover .fas{
        color: #ee4f4f;
        transform: scale(1.05);
    }

    #active{
        color: #ee4f4f;
        box-shadow: 0px 0px 5px #ee4f4f56;
    }

    #active .fas{
        color: #ee4f4f;
        transform: scale(1.05);
    }
}

@media screen and (max-width:550px){
    header{
        display: grid;
        grid-template-columns: 1fr;
        text-align: center;
        height: auto;
    }

    header #dropmenu{
        display: none;
    }

    .smallpic{
        display:inline-block !important;
    }
}
    </style>
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
                <img src="<?= "../".$user->profil ?>" alt="" class="profilepic listshow" >
                    <ul class="picturemenu" style="list-style:none;position:absolute;display:none;">
                        <li><a href="/Projet/Social/profil/<?= md5($user->email)."".$user->id?>" class="droplink">Profil</a></li>
                        <li><a href="/Projet/Social/logout" class="droplink">Log out</a></li> 
                    </ul>
            </div>
            

        </div>

        <nav class="small">
            <a href="/Projet/Social/timeline" id="active"><i class="fas fa-stream"></i></a>
            <a href="/Projet/Social/friends"><i class="fas fa-user-friends"></i></a>
            <a href="/Projet/Social/photos"><i class="fas fa-images"></i></a>
            <a href="/Projet/Social/settings"><i class="fas fa-cog"></i></a>
            <img src="<?= "../".$user->profil ?>" alt="" class="profilepic smallpic" style="display:none">
        </nav>
        
    </header>

    <div class="profilinfo">

        <div class="profilpic">
            <img src="<?= "../".$profil->profil;?>" alt="">
        </div>

        <h3><?= $profil->firstname." ".$profil->lastname; ?></h3>
        <h3><?= $profil->email; ?></h3>
        <h3><?= $profil->created_at; ?></h3>
        <a href="" class="send">send invitation</a>
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
</html>