<?php
    require "models/culture.php";

    class cultureController{

        public function getAll(){
            $callModel = new culture();
            $getAll = $callModel->getAll();
            return $getAll;
        }

        public function getbyName($nom){
            $nom = htmlspecialchars(strip_tags($nom));
            $callModel = new culture();
            $getbyName = $callModel->getbyName($nom);
            return $getbyName;
        }
    }