<?php
    require "models/lieu.php";

    class lieuController{

        public function getAll(){
            $callModel = new lieu();
            $getAll = $callModel->getAll();
            return $getAll;
        }

        public function getbyName($nom){
            $nom = htmlspecialchars(strip_tags($nom));
            $callModel = new lieu();
            $getbyName = $callModel->getbyName($nom);
            return $getbyName;
        }
    }