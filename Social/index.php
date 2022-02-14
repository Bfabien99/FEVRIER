<?php
    session_start();

    require 'vendor/autoload.php';
    require 'models/Usersmodel.php';
    require 'models/Postsmodel.php';

    $router = new AltoRouter();


    $router->map('GET',"/Projet/Social/",function()
    {
        require 'views/login.php'; 
    });
    $router->map('POST',"/Projet/Social/",function()
    {   
        if (isset($_POST["login"])) {
            $init = new Usersmodel();
            if (!empty($_POST["email"]) AND !empty($_POST["password"])){
                $check = $init->checkLogin($_POST["email"],$_POST["password"]);
                if ($check) {
                    $_SESSION["mysocial_user_email"] = $_POST["email"];
                    header('location:/Projet/Social/timeline'); 
                }
                else {
                    echo "Wrong email or password";
                    require 'views/login.php'; 
                }
            }

            else {
                echo "Fill all input";
                require 'views/login.php'; 
            }
        }
       
    });


    $router->map('GET',"/Projet/Social/signup",function()
    {
        require 'views/signup.php'; 
    });
    $router->map('POST',"/Projet/Social/signup",function()
    {   
        $dest = "fabienbrou99@gmail.com";
        $objet = "Test";
        $message = "  
        <p style='color:red'>  
        Bonjour\n 
        Salut Nous sommes Melo-code  
        </p>  
        ";
        $entetes = "From: zanpolobino99@gmail.com\n";
        $entetes .= "Cc: fabienbrou99@gmail.com\n";
        $entetes .= "Content-Type: text/html; charset=utf-8";
        
        if (mail($dest, $objet, $message, $entetes))
            {echo "Mail envoyé avec succès.";
            require 'views/signup.php';}
        else
            {echo "Un problème est survenu.";}
        exit;
    });


    $router->map('GET',"/Projet/Social/forget",function()
    {
        require 'views/forget.php'; 
    });


    $router->map('GET',"/Projet/Social/timeline",function()
    {   
        if (!$_SESSION["mysocial_user_email"]) {
            header('location:/Projet/Social/'); 
        }
        else 
        {
            $initusers = new Usersmodel();
            $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
                
            $initposts = new Postsmodel();
            $posts = $initposts->getPost();

            require 'views/users/timeline.php';
        }
        
    });
    $router->map('POST',"/Projet/Social/timeline",function()
    {   
        if (isset($_POST["post"])) {

            $initpost = new Postsmodel();
            if (!empty($_POST["textpost"]) OR !empty($_POST["imgpost"])){
                $initusers = new Usersmodel();
                $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
                $makeposts = $initpost->insertPost($user->id,$_POST["textpost"] ?? null,$_POST["imgpost"] ?? null);
                header('location:/Projet/Social/timeline');
            }
            else {
                echo "Nothing to post";
                require 'views/users/timeline.php'; 
            }
        }
       
    });


    $router->map('POST',"/Projet/Social/comment/[*:id]",function($id)
    {   
        $_SESSION["mysocial_user_post_id"] = $id;
        $initusers = new Usersmodel();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $initpost = new Postsmodel();
        $post = $initpost->ciblePost($_SESSION["mysocial_user_post_id"]);
        $comments = $initpost->getComment($_SESSION["mysocial_user_post_id"]);

        if (isset($_POST["post"])) {
            if (!empty($_POST["textpost"])){
                $makecomment = $initpost->insertComment($_POST["textpost"],$user->id,$post->id);
                header("location:".$_SERVER["HTTP_REFERER"]);
            }
            else {
                echo "Nothing to post";
                require 'views/users/comment.php'; 
            }
        }
        
    });
    $router->map('GET',"/Projet/Social/comment/[*:id]",function($id)
    {   
        $initusers = new Usersmodel();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $_SESSION["mysocial_user_post_id"] = $id;
        $initposts = new Postsmodel();
        $comments = $initposts->getComment($_SESSION["mysocial_user_post_id"]);
        $numberlikes = $initposts->getLike($_SESSION["mysocial_user_post_id"]);
        $alreadyLike = $initposts->alreadyLike($user->id,$_SESSION["mysocial_user_post_id"]);
        $post = $initposts->ciblePost($_SESSION["mysocial_user_post_id"]);
        if (!$post) {
            header('location:/Projet/Social/timeline');
        }
        else {
          require 'views/users/comment.php';  
        }
        
    });

    $router->map('GET',"/Projet/Social/like/[*:id]",function($id)
    {   
        $_SESSION["mysocial_user_like"] = $id;
        $initposts = new Postsmodel();
        $initusers = new Usersmodel();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $putlikes = $initposts->insertLike($user->id,$id);
        $gettlikes = $initposts->getLike($id);
        header("location:".$_SERVER["HTTP_REFERER"]."#post");
    });

    $router->map('GET',"/Projet/Social/logout",function()
    {   unset($_SESSION["mysocial_user_email"]);
        unset($_SESSION["mysocial_user_profil"]);
        unset($_SESSION["mysocial_user_post_id"]);
        header('location:/Projet/Social/');
    });

    $router->map('GET',"/Projet/Social/profil/[*:slug]",function($slug)
    {   
        
        $slug = str_split($slug,32);
        $_SESSION["mysocial_user_profil"] = $slug[1];
        $initusers = new Usersmodel();
        $profil = $initusers->getUserbyId($_SESSION["mysocial_user_profil"]);
        $initusers = new Usersmodel();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        require 'views/users/profil.php'; 
    });

    $router->map('GET',"/Projet/Social/friends",function()
    {
        require 'views/users/friends.php'; 
    });


    $router->map('GET',"/Projet/Social/photos",function()
    {
        require 'views/users/photos.php';
    });


    $router->map('GET',"/Projet/Social/settings",function()
    {
        require 'views/users/settings.php'; 
    });



    $match = $router->match();
    
    if( is_array($match) && is_callable( $match['target'] ) ) 
    {
        call_user_func_array( $match['target'], $match['params'] ); 
    } 
    else 
    {
    // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
?>
