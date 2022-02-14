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
        ini_set('SMTP','localhost');
        ini_set('smtp_port',1025);
        $_SESSION['mail_firstname'] = htmlentities(ucwords($_POST['firstname']));
        $_SESSION['mail_lastname'] = htmlentities(ucwords($_POST['lastname']));
        $_SESSION['mail_phone'] = htmlentities($_POST['phone']);
        $_SESSION['mail_email'] = htmlentities(strtolower($_POST['email']));
        $_SESSION['mail_birth'] = $_POST['birth'];
        $_SESSION['mail_gender'] = htmlentities($_POST['gender']);
        $_SESSION['mail_password'] = htmlentities($_POST['password']);
        $to      = $_SESSION['mail_email'];
        $subject = 'Confirm My Social Sign Up';
        $message = 'Je viens par ce message vous demander de confirmer votre insciption en cliquant sur le lien <a href="http://localhost/Projet/Social/confirmed" target="_blank">google</a>';
        // To send HTML mail, the Content-type header must be set
        $headers = array(
            'From' => 'webmaster@example.com',
            'Reply-To' => 'webmaster@example.com',
            'X-Mailer' => 'PHP/' . phpversion(),
            'MIME-Version' => '1.0',
            'Content-type' => 'text/html; charset=iso-8859-1'
        );

        if(mail($to, $subject, $message, $headers)){
            echo "Success";
            require 'views/signup.php';
        };
    });


    $router->map('GET',"/Projet/Social/confirmed",function()
    {   
        if (isset($_SESSION['mail_firstname']) AND isset($_SESSION['mail_lastname'])) {
            $init = new Usersmodel();
            $save = $init->insertUser($_SESSION['mail_firstname'],$_SESSION['mail_lastname'],$_SESSION['mail_phone'],$_SESSION['mail_email'],$_SESSION['mail_birth'],$_SESSION['mail_gender'],$_SESSION['mail_password']);
            echo 'Account created\n';
        echo $_SESSION['mail_firstname']." ".$_SESSION['mail_lastname']." ".$_SESSION['mail_email'];
        require 'views/confirmed.php';
        unset($_SESSION['mail_firstname'],$_SESSION['mail_lastname'],$_SESSION['mail_phone'],$_SESSION['mail_email'],$_SESSION['mail_gender'],$_SESSION['mail_birth'],$_SESSION['mail_password']); 
        }
        else {
            header('location:/Projet/Social/');
        }
        
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
            if (!empty($_POST["textpost"]) OR !empty($_FILES["imgpost"])){
                $initpost = new Postsmodel();
                $img_name = $_FILES['imgpost']['name'];
                $img_size = $_FILES['imgpost']['size'];
                $tmp_name = $_FILES['imgpost']['tmp_name'];
                $error = $_FILES['imgpost']['error'];
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'assets/image/posts/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                
                ($img_upload_path !== '') ? $img_upload_path : null;
                
                $initusers = new Usersmodel();
                $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
                $makeposts = $initpost->insertPost($user->id,$_POST["textpost"],$img_upload_path);
                require 'views/users/timeline.php'; 
            }
            else {
                echo "Write something";
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
        $initposts = new Postsmodel();
        $initusers = new Usersmodel();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $pictures = $initposts->getPicture($user->id);
        if ($pictures) {
            require 'views/users/photos.php';
        }
        else {
            echo "0 photo";
        }
        
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
