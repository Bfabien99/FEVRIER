<?php

    class Usersmodel{
                    
        private $users = 'users';

        public function database_connect()
        {
            $dsn="mysql:dbname=mysocial;host=localhost";
            $password = "";
            $user = "root";

            $connect = new PDO($dsn,$user,$password,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);

            if (!$connect) 
            {
                return new \Exception("Database cannot connect");
            }
            else
            {   
                return $connect;
            }
        }

        public function insertUser($firstname,$lastname,$phone,$email,$birth,$gender,$password)
        {
            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO ".$this->users." SET firstname = :firstname, lastname = :lastname, profil = :profil, phone = :phone, email = :email,birth = :birth, gender = :gender, password = :password, created_at = :date");
            if ($gender == "male") 
            {
                $path = "assets/image/user/profile/male.png";
            }
            else 
            {
                $path = "assets/image/user/profile/female.png";
            }
            $result = $query->execute([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'profil' => $path,
                'phone' => $phone,
                'email' => $email,
                'birth' => $birth,
                'gender' => $gender,
                'password' => $password,
                'date' => date('Y-m-d H:i:s')
            ]);

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function updateUser(){

        }

        public function removeUser(){

        }

        public function getUser($email)
        {
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM ".$this->users." WHERE email = :email");
            $query->execute([
                'email' => $email
            ]);
            $result = $query->fetch();
            
            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function getUserbyId($id)
        {
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM ".$this->users." WHERE id = :id");
            $query->execute([
                'id' => $id
            ]);
            $result = $query->fetch();
            
            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function checkLogin($email, $password)
        {
            $db = $this->database_connect();
            $query = $db->prepare('SELECT email, password FROM '.$this->users.' WHERE email = '.'"'.$email.'"'.' AND password = '.'"'.$password.'"');
            $query->execute();
            $result = $query->fetch();
            
            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function getFriendRequest($email){
            $db = $this->database_connect();
            $query = $db->prepare('SELECT * FROM users INNER JOIN requests ON users.id = requests.user_id WHERE requests.request_email = '.'"'.$email.'"');
            $query->execute();
            $result = $query->fetchAll();

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }
        }

        public function friendRequest($user_id, $request_email)
        {
            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO requests SET user_id = :user_id, request_email = :request_email");
            $result = $query->execute([
                'user_id' => $user_id,
                'request_email' => $request_email
            ]);

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function removeFriendRequest($friend_id)
        {
            $db = $this->database_connect();
            $query = $db->prepare("DELETE FROM requests WHERE requests.user_id = $friend_id");
            $result = $query->execute();

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

        public function getFriend($email){
            $db = $this->database_connect();
            $query = $db->prepare('SELECT * FROM users INNER JOIN friends ON users.id = friends.user_id WHERE friends.friends_email = '.'"'.$email.'"');
            $query->execute();
            $result = $query->fetchAll();

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }
        }

        public function insertFriend($user_id,$friend_email){

            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO friends SET friends.user_id = :user_id, friends.friends_email = :friend_email");
            $result = $query->execute([
                'user_id' => $user_id,
                'friend_email' => $friend_email
            ]);

            if (!$result) 
            {
                return false;
            }
            else 
            {
                return $result;
            }

        }

    }