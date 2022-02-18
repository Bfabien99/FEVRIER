<?php
    session_start();

    require 'vendor/autoload.php';
    require 'controllers/Userscontroller.php';
    require 'controllers/Postscontroller.php';

    function encrypt($string)
    {
        $string = md5($string);
        $string = crypt($string, '$5$rounds=5$charteuse$');
        $string = sha1($string);
        $string = hash('gost', $string);
        return $string;
    };

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        return $data;
    };

    $router = new AltoRouter();


    $router->map('GET',"/Projet/Social/",function()
    {
        unset($_SESSION["mysocial_forget_email"]);
        require 'views/login.php'; 
    });
    $router->map('POST',"/Projet/Social/",function()
    {   
        $msg = "";
        if (isset($_POST["login"])) {
            $init = new Userscontroller();
            if (!empty($_POST["email"]) AND !empty($_POST["password"])){
                $check = $init->checkLogin(checkInput(strtolower($_POST["email"])),checkInput(encrypt($_POST["password"])));
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
                $verifymail = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                if(filter_var($verifymail, FILTER_VALIDATE_EMAIL)){
                    $initusers = new Userscontroller();
                    $verifyuser = $initusers->getUser($_POST['email']);
                    if($verifyuser){
                        $msg = "User Already exist";
                        require 'views/signup.php';
                    }
                    else{
                        if($_POST['password'] == $_POST['cpassword'])
                        {
                            ini_set('SMTP','localhost');
                            ini_set('smtp_port',1025);
                            
                            $_SESSION['mail_email'] = checkInput(strtolower($_POST['email']));
                            
                            $to      = $_SESSION['mail_email'];
                            $subject = 'Confirm My Social Sign Up';
                            $message = 'Dear '.$_POST['firstname'].' '.$_POST['lastname'].'; to confirm your subscription to My Social, click on the link <a href="http://localhost/Projet/Social/confirmed/'.encrypt($to).'" target="_blank">Confirm Mail</a>';
                            // To send HTML mail, the Content-type header must be set
                            $headers = array(
                                'From' => 'webmaster@example.com',
                                'Reply-To' => 'webmaster@example.com',
                                'X-Mailer' => 'PHP/' . phpversion(),
                                'MIME-Version' => '1.0',
                                'Content-type' => 'text/html; charset=iso-8859-1'
                            );
        
                            if(mail($to, $subject, $message, $headers)){
                                $_SESSION['mail_firstname'] = checkInput(ucwords($_POST['firstname']));
                                $_SESSION['mail_lastname'] = checkInput(ucwords($_POST['lastname']));
                                $_SESSION['mail_phone'] = checkInput($_POST['phone']);
                                $_SESSION['mail_birth'] = checkInput($_POST['birth']);
                                $_SESSION['mail_gender'] = checkInput($_POST['gender']);
                                $_SESSION['mail_password'] = checkInput(encrypt($_POST['password']));
                                $msg = "We send you a link to your email address. Click to confirm your inscription.";
                                require 'views/signup.php';
                            }
                        }
                        else{
                            $msg = "password different";
                            require 'views/signup.php';
                        }
                    }
                }
                else
                {
                    $msg = "no valide email";
                    require 'views/signup.php';
                }

            }
            else{
                $msg = "FIll all input";
                require 'views/signup.php';
            }

        }
        

    });


    $router->map('GET',"/Projet/Social/confirmed/[*:slug]",function($slug)
    {   
        if (isset($_SESSION['mail_firstname']) AND isset($_SESSION['mail_lastname']) AND $slug = encrypt($_SESSION['mail_email'])) {
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
    $router->map('POST',"/Projet/Social/forget",function()
    {   
        $msg = "";
        $firstname = checkInput($_POST['firstname']);
        $email = checkInput(strtolower($_POST['email']));
        if(!empty($firstname) AND !empty($email)){
            $init = new Userscontroller();
            $user = $init->getUser($email);
            if($user){
                if(ucwords($firstname."".$user->id) != $user->firstname."".$user->id){
                    $msg ="Sorry, but this firstname doesn't corresponds to your user firstname";
                    require 'views/forget.php'; 
                }
                else{
                    $_SESSION["mysocial_forget_email"] = $user->email;
                    header('Location:/Projet/Social/newpassword/'.encrypt($user->lastname."NAN".$user->id));
                }
                
            }
            else {
                $msg = "Sorry we don't know your. You can SignUp right now. <a href = '/Projet/Social/signup' >Click me</a>";
                require 'views/forget.php';
            }
            
        }
        else{
            $msg = "Enter valid user email and user name";
            require 'views/forget.php'; 
        }
        
    });


    $router->map('GET',"/Projet/Social/newpassword/[*:slug]",function($slug)
    {  
        if(!empty($_SESSION["mysocial_forget_email"])){
            $init = new Usersmodel();
            $user = $init->getUser($_SESSION["mysocial_forget_email"]);
            if ($user AND $slug == encrypt($user->lastname."NAN".$user->id)) {
                require 'views/users/newpassword.php';
            }
            else {
                echo "WARNING : YOU CANNOT ACCESS THIS AREA";
            }

        }
        else{
            echo "<a href='/Projet/Social/'>Go back</a>";
        }
        
    });
    $router->map('POST',"/Projet/Social/newpassword/[*:slug]",function()
    {  
        $init = new Usersmodel();
        $user = $init->getUser($_SESSION["mysocial_forget_email"]);
        $msg ="";
        if(!empty($_SESSION["mysocial_forget_email"])){
            if(isset($_POST['setpass']))
                    {
                        
                        if(!empty($_POST['npassword']) AND !empty($_POST['cpassword']))
                        {   
                            if($_POST['npassword'] == $_POST['cpassword'])
                            {   
                                $npassword = checkInput(encrypt($_POST['npassword']));
                                ini_set('SMTP','localhost');
                                ini_set('smtp_port',1025);
                                $to      = $user->email;
                                $subject = 'MySocial New Password';
                                $message = 'Dear '.$user->firstname.' '.$user->lastname.'; Your new password is " '.$_POST['npassword'].' "';
                                // To send HTML mail, the Content-type header must be set
                                $headers = array(
                                    'From' => 'webmaster@example.com',
                                    'Reply-To' => 'webmaster@example.com',
                                    'X-Mailer' => 'PHP/' . phpversion(),
                                    'MIME-Version' => '1.0',
                                    'Content-type' => 'text/html; charset=iso-8859-1'
                                );
                
                                if(mail($to, $subject, $message, $headers))
                                {   
                                    $update = $init->updateUser($user->id,$user->profil,$user->firstname,$user->lastname,$user->email,$npassword);
                                    $msg = "Success. we send you an email with your new password.";
                                    require 'views/users/newpassword.php';
                                    unset($_SESSION["mysocial_forget_email"]);
                                }
                                else{
                                    $msg = "Sorry we can't respond now. Please try later";
                                    require 'views/users/newpassword.php';
                                }
                            }
                            else 
                            {
                                $msg = "password is different";
                                require 'views/users/newpassword.php';
                            }
                        }
                        else
                        {
                            $msg = "Fill all input dear ".$user->firstname." ".$user->lastname;
                            require 'views/users/newpassword.php';
                        }
                        
                    
                
                    }
        }
        else {
            header('Location:/Projet/Social/');
        }
        

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
                $makeposts = $initpost->insertPost($user->id,checkInput($_POST["textpost"]),$img_upload_path);
                require 'views/users/timeline.php'; 
            }
            else {
                $msg = "Write something or upload picture";
                require 'views/users/timeline.php'; 
            }
        }

        //user search by firstname
        if(isset($_POST['searchuser'])){

            $initusers = new Usersmodel();
            $results = $initusers->searchUsers(checkInput($_POST['search']));
            require 'views/users/results.php';
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
                $makecomment = $initpost->insertComment(checkInput($_POST["textpost"]),checkInput($user->id),checkInput($post->id));
                header("location:".$_SERVER["HTTP_REFERER"]);
            }
            else {
                $msg = "Nothing to post";
                require 'views/users/comment.php'; 
            }
        }

        if(isset($_POST['searchuser'])){

            $initusers = new Usersmodel();
            $results = $initusers->searchUsers(checkInput($_POST['search']));
            require 'views/users/results.php';
        }
        
    });
    $router->map('GET',"/Projet/Social/comment/[*:id]",function($id)
    {   
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $_SESSION["mysocial_user_post_id"] = checkInput($id);
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
        $id = checkInput($id);
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
        $slug = checkInput($slug);
        $slug = str_split($slug,32);
        $_SESSION["mysocial_user_profil"] = $slug[1];
        $initusers = new Userscontroller();
        $profil = $initusers->getUserbyId($_SESSION["mysocial_user_profil"]);
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $isFriend = $initusers->isFriend($profil->email,$user->id);
        $isRequest = $initusers->isRequest($profil->email);
        require 'views/users/profil.php'; 
    });


    $router->map('GET',"/Projet/Social/friends",function()
    {   
        $initusers = new Userscontroller();
        $getFriend = $initusers->getFriend($_SESSION["mysocial_user_email"]);
        require 'views/users/friends.php'; 
    });
    $router->map('POST',"/Projet/Social/friends",function()
        {   
            if(isset($_POST['searchuser'])){

                $initusers = new Usersmodel();
                $results = $initusers->searchUsers(checkInput($_POST['search']));
                require 'views/users/results.php';
            }
        });


    $router->map('GET',"/Projet/Social/photos",function()
    {   
        $initposts = new Postscontroller();
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $pictures = $initposts->getPicture($user->id);
        
            require 'views/users/photos.php';
        
    });
    $router->map('POST',"/Projet/Social/photos",function()
        {   
            if(isset($_POST['searchuser'])){

                $initusers = new Usersmodel();
                $results = $initusers->searchUsers(checkInput($_POST['search']));
                require 'views/users/results.php';
            }
            
        });

    $router->map('GET',"/Projet/Social/invite/[*:email]",function($email)
    {   
        $initposts = new Postscontroller();
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $request = $initusers->getUser($email);
        $sendrequest = $initusers->friendRequest($user->id,$email);

        header("location:".$_SERVER["HTTP_REFERER"]);
        require '/Projet/Social/profil/'.md5($email)."".($request->id);
        
    });


    $router->map('GET',"/Projet/Social/settings",function()
    {   
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $getRequest = $initusers->getFriendRequest($_SESSION["mysocial_user_email"]);
        $getFriend = $initusers->getFriend($_SESSION["mysocial_user_email"]);
        $initposts = new Postscontroller();
        $pictures = $initposts->getPicture($user->id);
        require 'views/users/settings.php';
        //update user
        

    });
    $router->map('POST',"/Projet/Social/settings",function(){
        $initusers = new Userscontroller();
        $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
        $getRequest = $initusers->getFriendRequest($_SESSION["mysocial_user_email"]);
        $getFriend = $initusers->getFriend($_SESSION["mysocial_user_email"]);
        $initposts = new Postscontroller();
        $pictures = $initposts->getPicture($user->id);
        $msg = "";
        if(isset($_POST['update']))
        {   
            $initusers = new Userscontroller();
            $user = $initusers->getUser($_SESSION["mysocial_user_email"]);
            if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email']))
            {   
                $_POST['firstname'] = checkInput($_POST['firstname']);
                $_POST['lastname'] = checkInput($_POST['lastname']);
                $_POST['email'] = checkInput($_POST['email']);
                $_POST['npassword'] = checkInput($_POST['npassword']);
                $_POST['cpassword'] = checkInput($_POST['cpassword']);
                if(!empty($_FILES["imgpost"]) AND $_FILES["imgpost"]['error'] == 0)
                {   
                    $img_name = $_FILES['imgpost']['name'];
                    $img_size = $_FILES['imgpost']['size'];
                    $tmp_name = $_FILES['imgpost']['tmp_name'];
                    $error = $_FILES['imgpost']['error'];
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'assets/image/posts/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    if(!empty($_POST['npassword']) OR !empty($_POST['cpassword']))
                    {
                        if($_POST['npassword'] == $_POST['cpassword'])
                        {
                            $update = $initusers->updateUser($user->id,$img_upload_path,$_POST['firstname'],$_POST['lastname'],$_POST['email'],encrypt($_POST['npassword']));
                            $makeposts = $initposts->insertPost($user->id,"I have a new profil picture...",$img_upload_path);
                            $msg = "Update succesfully";
                            require 'views/users/settings.php';
                        }
                        else
                        {
        
                            $msg = "Wrong password";
                            require 'views/users/settings.php';
                        }
                    }
                    else 
                    {
                        $update = $initusers->updateUser($user->id,$img_upload_path,$_POST['firstname'],$_POST['lastname'],$_POST['email'],$user->password);
                        $makeposts = $initposts->insertPost($user->id,"I have a new profil picture...",$img_upload_path);
                        $msg = "Update succesfully";
    
                        require 'views/users/settings.php';
                    }
                }

                else
                {
                    if(!empty($_POST['npassword']) OR !empty($_POST['cpassword']))
                    {
                        if($_POST['npassword'] == $_POST['cpassword'])
                        {
                            $update = $initusers->updateUser($user->id,$user->profil,$_POST['firstname'],$_POST['lastname'],$_POST['email'],encrypt($_POST['npassword']));
                            $msg = "Update succesfully";
        
                            require 'views/users/settings.php';
                        }
                        else
                        {
        
                            $msg ="Wrong password";
                            require 'views/users/settings.php';
                        }
                    }
                    else 
                    {
                        $update = $initusers->updateUser($user->id,$user->profil,$_POST['firstname'],$_POST['lastname'],$_POST['email'],$user->password);
                        $msg = "Update succesfully";
    
                        require 'views/users/settings.php';
                    }
                }
                
            }
            else
            {
                $smg = "fill all input";
                require 'views/users/settings.php';
            }

        }

        if(isset($_POST['searchuser'])){

            $initusers = new Usersmodel();
            $results = $initusers->searchUsers(checkInput($_POST['search']));
            require 'views/users/results.php';
        }

    });


    $router->map('GET',"/Projet/Social/settings/add[*:slug]",function($slug)
    {   
        $slug = checkInput($slug);
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
        $slug = checkInput($slug);
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
