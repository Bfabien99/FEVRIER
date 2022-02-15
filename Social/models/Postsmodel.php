<?php

    class Postsmodel{
            
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

        public function insertPost($user_id,$text,$image)
        {   
            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO posts SET user_id = :user_id, text = :text, image = :image");
            $result = $query->execute([
                'user_id' => $user_id,
                'text' => $text,
                'image' => $image
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

        public function getPost()
        {
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM users INNER JOIN posts ON users.id = posts.user_id ORDER BY posts.posted_at DESC");
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

        public function ciblePost($post_id){
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM users INNER JOIN posts ON users.id = posts.user_id WHERE posts.id = $post_id");
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

        public function getPicture($id){
            $db = $this->database_connect();
            $query = $db->prepare("SELECT image,posted_at FROM users INNER JOIN posts ON users.id = $id WHERE posts.user_id = $id AND posts.image IS NOT NULL AND posts.image<>'' ORDER BY posts.posted_at DESC");
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

        public function insertComment($comment, $user_id, $post_id){

            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO comments SET text = :text, user_id = :user_id, post_id = :post_id");
            $result = $query->execute([
                'text' => $comment,
                'user_id' => $user_id,
                'post_id' => $post_id
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

        public function getComment($post_id){

            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM users INNER JOIN comments ON users.id = comments.user_id WHERE comments.post_id = :post_id ORDER BY comments.commented_at ASC");
            $query->execute([
                'post_id' => $post_id
            ]);
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

        public function insertLike($user_id, $post_id){

            $db = $this->database_connect();
            $query = $db->prepare("INSERT INTO likes SET user_id = :user_id, post_id = :post_id");
            $result = $query->execute([
                'user_id' => $user_id,
                'post_id' => $post_id
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

        public function getLike($post_id){

            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM users INNER JOIN likes ON users.id = likes.user_id WHERE likes.post_id = :post_id");
            $query->execute([
                'post_id' => $post_id
            ]);
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

        public function alreadyLike($user_id, $post_id){
            $db = $this->database_connect();
            $query = $db->prepare("SELECT * FROM likes WHERE likes.user_id = :user_id AND likes.post_id = :post_id");
            $result = $query->execute([
                'user_id' => $user_id,
                'post_id' => $post_id
            ]);

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

        

    }