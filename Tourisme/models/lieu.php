<?php
    
    class lieu{

        public function dbConnect() 
        {
            $dsn="mysql:dbname=tourisme;host=localhost";
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

        public function getAll(){
            $db = $this->dbConnect();
            $query = $db->prepare("SELECT * FROM lieux ORDER BY nom ASC");
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

        public function getbyName($nom){
            $db = $this->dbConnect();
            $query = $db->prepare("SELECT * FROM lieux WHERE nom LIKE '%$nom%'");
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

    }