<?php
    session_start();

    require 'vendor/autoload.php';
    require 'controllers/Userscontroller.php';
    require 'controllers/Postscontroller.php';

    $router = new AltoRouter();


    $router->map('GET',"/Projet/Social/",function()
    {
        require 'views/login.php'; 
    });
    $router->map('POST',"/Projet/Social/",function()
    {   
        $msg = "";
        if (isset($_POST["login"])) {
            $init = new Userscontroller();
            if (!empty($_POST["email"]) AND !empty($_POST["password"])){
                $check = $init->checkLogin(htmlentities(strip_tags(strtolower($_POST["email"]))),htmlentities(md5($_POST["password"])));
                if ($check) {
                    $_SESSION["mysocial_user_email"] = $_POST["email"];
                    header('location:/Projet/Social/timeline'); 
                }
                else {
                    $msg = "Wrong email or password";
                    require 'views/login.php'; 
                }
            }

            else {
                $msg = "Fill all input";
                require 'views/login.php'; 
            }
        }
       
    });


    $router->map('GET',"/Projet/Social/signup",function()
    {
        require 'views/signup.php'; 
    });
    $router->map('POST',"/Projet/Social/signup",function()
    {   $msg = "";
        if(isset($_POST['signup']))
        {
            if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['phone']) AND !empty($_POST['email']) AND !empty($_POST['birth']) AND !empty($_POST['gender']) AND !empty($_POST['password']) AND !empty($_POST['cpassword']))
            {
                if($_POST['password'] == $_POST['cpassword'])
                {
                    ini_set('SMTP','localhost');
                    ini_set('smtp_port',1025);
                    $_SESSION['mail_firstname'] = htmlentities(strip_tags(ucwords($_POST['firstname'])));
                    $_SESSION['mail_lastname'] = htmlentities(strip_tags(ucwords($_POST['lastname'])));
                    $_SESSION['mail_phone'] = htmlentities(strip_tags($_POST['phone']));
                    $_SESSION['mail_email'] = htmlentities(strip_tags(strtolower($_POST['email'])));
                    $_SESSION['mail_birth'] = $_POST['birth'];
                    $_SESSION['mail_gender'] = htmlentities(strip_tags($_POST['gender']));
                    $_SESSION['mail_password'] = htmlentities(strip_tags(md5($_POST['password'])));
                    $to      = $_SESSION['mail_email'];
                    $subject = 'Confirm My Social Sign Up';
                    $message = 'Je viens par ce message vous demander de confirmer votre insciption à My Social en cliquant sur le lien <a href="http://localhost/Projet/Social/confirmed" target="_blank">Confirm Mail</a>';
                    // To send HTML mail, the Content-type header must be set
                    $headers = array(
                        'From' => 'webmaster@example.com',
                        'Reply-To' => 'webmaster@example.com',
                        'X-Mailer' => 'PHP/' . phpversion(),
                        'MIME-Version' => '1.0',
                        'Content-type' => 'text/html; charset=iso-8859-1'
                    );

                    if(mail($to, $subject, $message, $headers)){
                        $msg = "We send you a link to your email address. Click to confirm your inscription.";
                        require 'views/signup.php';
                    };
                }
                else{
                    $msg = "password different";
                    require 'views/signup.php';
                }

            }
            else{
                $msg = "FIll all input";
                require 'views/signup.php';
            }

        }
        

    });


    $router->map('GET',"/Projet/Social/confirmed",function()
    {   
        if (isset($_SESSION['mail_firstname']) AND isset($_SESSION['mail_lastname'])) {
            $init = new Userscontroller();
            $save = $init->insertUser($_SESSION['mail_firstname'],$_SESSION['mail_lastname'],$_SESSION['mail_phone'],$_SESSION['mail_email'],$_SESSION['mail_birth'],$_SESSION['mail_gender'],$_SESSION['mail_password']);
            echo 'Account created\n';
        echo "Nom :".$_SESSION['mail_firstname']." ".$_SESSION['mail_lastname']." <br> Email :".$_SESSION['mail_email'];
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
            $initusers = new Userscontroller();
            $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
                
            $initposts = new Postscontroller();
            $posts = $initposts->getPost();

            require 'views/users/timeline.php';
        }
        
    });
    $router->map('POST',"/Projet/Social/timeline",function()
    {   
        $msg="";
        if (isset($_POST["post"])) {
            if (!empty($_POST["textpost"]) OR $_FILES["imgpost"]['error'] == 0){
                if ($_FILES["imgpost"]['error'] == 0) {
                    $img_name = $_FILES['imgpost']['name'];
                    $img_size = $_FILES['imgpost']['size'];
                    $tmp_name = $_FILES['imgpost']['tmp_name'];
                    $error = $_FILES['imgpost']['error'];
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'assets/image/posts/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                }
                else{
                    $img_upload_path = null; 
                }
                
                
                $initusers = new Userscontroller();
                $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
                $initpost = new Postscontroller();
                $makeposts = $initpost->insertPost($user->id,$_POST["textpost"],$img_upload_path);
                require 'views/users/timeline.php'; 
            }
            else {
                $msg = "Write something or upload picture";
                require 'views/users/timeline.php'; 
            }
        }
       
    });


    $router->map('POST',"/Projet/Social/comment/[*:id]",function($id)
    {   
        $msg="";
        $_SESSION["mysocial_user_post_id"] = $id;
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $initpost = new Postscontroller();
        $post = $initpost->ciblePost($_SESSION["mysocial_user_post_id"]);
        $comments = $initpost->getComment($_SESSION["mysocial_user_post_id"]);
        $numberlikes = $initpost->getLike($_SESSION["mysocial_user_post_id"]);
        $alreadyLike = $initpost->alreadyLike($user->id,$_SESSION["mysocial_user_post_id"]);

        if (isset($_POST["post"])) {
            if (!empty($_POST["textpost"])){
                $makecomment = $initpost->insertComment($_POST["textpost"],$user->id,$post->id);
                header("location:".$_SERVER["HTTP_REFERER"]);
            }
            else {
                $msg = "Nothing to post";
                require 'views/users/comment.php'; 
            }
        }
        
    });
    $router->map('GET',"/Projet/Social/comment/[*:id]",function($id)
    {   
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $_SESSION["mysocial_user_post_id"] = $id;
        $initposts = new Postscontroller();
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
        $initposts = new Postscontroller();
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $putlikes = $initposts->insertLike($user->id,$id);
        $gettlikes = $initposts->getLike($id);
        header("location:".$_SERVER["HTTP_REFERER"]);
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
        $initusers = new Userscontroller();
        $profil = $initusers->getUserbyId($_SESSION["mysocial_user_profil"]);
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        require 'views/users/profil.php'; 
    });

    $router->map('GET',"/Projet/Social/friends",function()
    {
        require 'views/users/friends.php'; 
    });


    $router->map('GET',"/Projet/Social/photos",function()
    {   
        $initposts = new Postscontroller();
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $pictures = $initposts->getPicture($user->id);
        
            require 'views/users/photos.php';
        
    });


    $router->map('GET',"/Projet/Social/settings",function()
    {   
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $getRequest = $initusers->getFriendRequest($_SESSION["mysocial_user_email"]);
        $getFriend = $initusers->getFriend($_SESSION["mysocial_user_email"]);
        require 'views/users/settings.php'; 
    });

    $router->map('GET',"/Projet/Social/settings/add[*:slug]",function($slug)
    {   
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $friend = $initusers->getUser($slug);
        $initusers->insertFriend($user->id,$friend->email);
        $initusers->insertFriend($friend->id,$user->email);
        $initusers->removeFriendRequest($friend->id);
        header("location:".$_SERVER["HTTP_REFERER"]);
        require 'views/users/settings.php';
    });
    $router->map('GET',"/Projet/Social/settings/remove[*:slug]",function($slug)
    {   
        $initusers = new Userscontroller();
        $friend = $initusers->getUser($slug);
        $initusers->removeFriendRequest($friend->id);
        header("location:".$_SERVER["HTTP_REFERER"]);
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
