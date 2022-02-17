<?php

    $servername = "localhost";
    $username ="root";
    $password ="";
    $dbname = "mysocial";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Connection error : ".mysqli_connect_error());
    }
   
    if(!empty($_POST['search'])){

        $name = $_POST['search'];

        $sql = "SELECT * FROM users WHERE firstname LIKE '%$name%'";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $data [] = array('id' => $row['id'], 'firstname' => $row['firstname'], 'lastname' =>$row['lastname'], 'email' =>$row['email']);
            }
        }

        echo json_encode($data);
    }