<?php

    require 'models/Usersmodel.php';

    class Userscontroller{
            
        public function newUser($firstname,$lastname,$phone,$email,$birth,$gender,$password)
        {
            $initModel = new Usersmodel();
            $call = $initModel->insertUser($firstname,$lastname,$phone,$email,$birth,$gender,$password);
        }
        
    }