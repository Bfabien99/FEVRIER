<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <script src="../assets/script/jquery-3.6.0.min.js"></script>
    <title><?= $nom ?></title>
    <style>
        .description{
            margin: auto;
            width: 80%;
        }

        .description p{
            margin: 1.2em 1px;
            text-align: justify;
        }

        .description ul{
            margin: auto;
            width: 70%;
            font-weight: bold;
        }

        .nom{
            color: orangered;
            text-transform: uppercase;
            margin: 1em;
        }

        .image{
            width: auto;
            object-fit: contain;
            height: auto;
            max-height: 400px;
            border-radius: 3px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0,0.4);
        }

        .back{
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height:normal;
            text-align: center;
            width: 20%;
            padding: 0.5em;
            border-radius: 5px;
            color: white;
            background-color: green;
        }

        @media (max-width:900px){
            .image{
                width: 80%;
            }

            .back{
                width: 50%;
            }
        }
    </style>
</head>
<body>

    <?php include 'layouts/navbar.php';?>

    <div class="main" id="main">

        <?php if(!empty($getLieux)):?>

            <section class="details">
                <h1 class="nom"><?= $getLieux->nom;?></h1>
                <img src="../<?= $getLieux->image;?>" alt="<?= $getLieux->nom;?>" class="image">
                <div class="description"><?= $getLieux->description;?></div>
            </section>
            
            <a href="/Projet/Tourisme/#lieu" class="back">Retour</a>

        <?php endif;?>
    

        <?php if(!empty($getPlat)):?>

            <section class="details">
                <h1 class="nom"><?= $getPlat->nom;?></h1>
                <img src="../<?= $getPlat->image;?>" alt="<?= $getPlat->nom;?>" class="image">
                <div class="description"><?= $getPlat->description;?></div>
            </section>

            <a href="/Projet/Tourisme/#plat" class="back">Retour</a>

        <?php endif;?>
    

        <?php if(!empty($getCulture)):?>

            <section class="details">
                <h1 class="nom"><?= $getCulture->nom;?></h1>
                <img src="../<?= $getCulture->image;?>" alt="<?= $getCulture->nom;?>" class="image">
                <div class="description"><?= $getCulture->description;?></div>
            </section>

            <a href="/Projet/Tourisme/#culture" class="back">Retour</a>

        <?php endif;?>

    </div>
    

</body>
<script src="../assets/script/script.js"></script>
</html>