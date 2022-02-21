<?php
    require "models/plat.php";

    class platController{

        public function getAll(){
            $callModel = new plat();
            $getAll = $callModel->getAll();
            return $getAll;
        }

        public function getbyName($nom){
            $nom = htmlspecialchars(strip_tags($nom));
            $callModel = new plat();
            $getbyName = $callModel->getbyName($nom);
            return $getbyName;
        }
    }