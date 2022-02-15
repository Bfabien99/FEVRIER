<?php

    require 'models/Postsmodel.php';

    class Postscontroller{
        
        public function insertPost($user_id,$text,$image)
        {
            $initModel = new Postsmodel();
            $call = $initModel->insertPost($user_id,$text,$image);
            return $call;
        }

        public function getPost()
        {
            $initModel = new Postsmodel();
            $call = $initModel->getPost();
            return $call;
        }
        
        public function ciblePost($post_id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->ciblePost($post_id);
            return $call;
        }
        
        public function getPicture($id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->getPicture($id);
            return $call;
        }
        
        public function insertComment($comment, $user_id, $post_id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->insertComment($comment, $user_id, $post_id);
            return $call;
        }
        
        public function getComment($post_id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->getComment($post_id);
            return $call;
        }
        
        public function insertLike($user_id, $post_id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->insertLike($user_id, $post_id);
            return $call;
        }
        
        public function getLike($post_id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->getLike($post_id);
            return $call;
        }
        
        public function alreadyLike($user_id, $post_id)
        {
            $initModel = new Postsmodel();
            $call = $initModel->alreadyLike($user_id, $post_id);
            return $call;
        }

    }