<?php

    require 'models/Usersmodel.php';

    class Userscontroller{
            
        public function insertUser($firstname,$lastname,$phone,$email,$birth,$gender,$password)
        {
            $initModel = new Usersmodel();
            $call = $initModel->insertUser($firstname,$lastname,$phone,$email,$birth,$gender,$password);
            return $call;
        }

        public function updateUser($id,$profil,$firstname,$lastname,$email,$password)
        {
            $initModel = new Usersmodel();
            $call = $initModel->updateUser($id,$profil,$firstname,$lastname,$email,$password);
            return $call;
        }

        public function removeUser()
        {
            $initModel = new Usersmodel();

        }

        public function searchUsers($firstname){
            $initModel = new Usersmodel();
            $call = $initModel->searchUsers($firstname);
            return $call;
        }
        
        public function getUser($email){
            $initModel = new Usersmodel();
            $call = $initModel->getUser($email);
            return $call;
        }

        public function getUserbyId($id){
            $initModel = new Usersmodel();
            $call = $initModel->getUserbyId($id);
            return $call;
        }

        public function checkLogin($email, $password){
            $initModel = new Usersmodel();
            $call = $initModel->checkLogin($email, $password);
            return $call; 
        }

        public function getFriendRequest($email)
        {
            $initModel = new Usersmodel();
            $call = $initModel->getFriendRequest($email);
            return $call;
        }

        public function isRequest($email)
        {
            $initModel = new Usersmodel();
            $call = $initModel->isRequest($email);
            return $call;
        }

        public function friendRequest($user_id, $request_email)
        {
            $initModel = new Usersmodel();
            $call = $initModel->friendRequest($user_id, $request_email);
            return $call;
        }

        public function getFriend($email)
        {
            $initModel = new Usersmodel();
            $call = $initModel->getFriend($email);
            return $call;
        }

        public function isFriend($email,$id){
            $initModel = new Usersmodel();
            $call = $initModel->isFriend($email,$id);
            return $call;
        }

        public function insertFriend($user_id,$friend_email){
            $initModel = new Usersmodel();
            $call = $initModel->insertFriend($user_id,$friend_email);
            return $call;
        }

        public function removeFriendRequest($friend_id){
            $initModel = new Usersmodel();
            $call = $initModel->removeFriendRequest($friend_id);
            return $call;
        }


    }