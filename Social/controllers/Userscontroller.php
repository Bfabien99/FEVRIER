<?php

    require 'models/Usersmodel.php';

    class Userscontroller{
            
        public function insertUser($firstname,$lastname,$phone,$email,$birth,$gender,$password)
        {
            $initModel = new Usersmodel();
            $call = $initModel->insertUser($firstname,$lastname,$phone,$email,$birth,$gender,$password);
            return $call;
        }

        public function updateUser()
        {
            $initModel = new Usersmodel();

        }

        public function removeUser()
        {
            $initModel = new Usersmodel();

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
    }