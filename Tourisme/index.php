<?php
    require "vendor/autoload.php";
    require "controllers/lieuController.php";
    require "controllers/platController.php";
    require "controllers/cultureController.php";
    // $lieu = new lieuController();
    // $lieu = new lieuController();
    // $lieu = new lieuController();
    $router = new AltoRouter();

    $router->map('GET',"/Projet/Tourisme/",function()
    {   
        $lieu = new lieuController();
        $getAllLieux = $lieu->getAll();

        $plat = new platController();
        $getAllPlat = $plat->getAll();

        $culture = new cultureController();
        $getAllCulture = $culture->getAll();

        require 'view/home.php'; 
    });


    $router->map('GET',"/Projet/Tourisme/more/[*:nom]",function($nom)
    {   
        $nom = urldecode($nom);
        
        $lieu = new lieuController();
        $getLieux = $lieu->getbyName($nom);

        $plat = new platController();
        $getPlat = $plat->getbyName($nom);

        $culture = new cultureController();
        $getCulture = $culture->getbyName($nom);
        require 'view/more.php';
    });


    $match = $router->match();

    if( is_array($match) && is_callable( $match['target'] ) ) 
    {
        call_user_func_array( $match['target'], $match['params'] ); 
    } 
    else 
    {
    // no route was matched
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }