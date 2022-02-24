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
        .description
        {
            margin: auto;
            width: 80%;
        }

        .description p
        {
            margin: 1.2em 1px;
            text-align: justify;
        }

        .description ul
        {
            margin: auto;
            width: 70%;
            font-weight: bold;
        }

        .nom
        {
            color: orangered;
            text-transform: uppercase;
            margin: 1em;
        }

        .image
        {
            width: auto;
            object-fit: contain;
            height: auto;
            max-height: 400px;
            border-radius: 3px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0,0.4);
        }

        .image:hover
        {
            transition: all cubic-bezier(0.23, 1, 0.320, 1);
            border: 1px solid orange;
        }

        .back
        {
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

        #galerie
        {
            gap: 2em;
        }

        .imgbox
        {
            width: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .illustration
        {
            width: 30%;
            height: 400px;
            border-radius: 3px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0,0.4);
        }

        .illustration:hover
        {
            transition:all 0.2s ease-out;
            transform: scale(1.1);
            border: 1px solid green;
        }

        @media (max-width:900px)
        {
            .image
            {
                width: 80%;
                border: none;
                box-shadow: none;
            }

            .back
            {
                width: 50%;
            }

            .imgbox
            {
                width: 90%;
                display: flex;
                flex-direction: column;
                gap: 2em;
                align-items: center;
            }

            .illustration
            {
                width: 100%;
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

            <section id="galerie">
                <h3 style="color: green;text-decoration:underline;text-transform:capitalize"><?= $getLieux->nom;?> en images</h3>
                <div class="imgbox">
                <img src="../<?= $getLieux->image1;?>" alt="<?= $getLieux->nom;?>" class="illustration">
                <img src="../<?= $getLieux->image2;?>" alt="<?= $getLieux->nom;?>" class="illustration">
                <img src="../<?= $getLieux->image3;?>" alt="<?= $getLieux->nom;?>" class="illustration">
                </div>
            </section>
            
            <a href="/Projet/Tourisme/#lieu" class="back">Retour</a>

        <?php endif;?>
    

        <?php if(!empty($getPlat)):?>

            <section class="details">
                <h1 class="nom"><?= $getPlat->nom;?></h1>
                <img src="../<?= $getPlat->image;?>" alt="<?= $getPlat->nom;?>" class="image">
                <div class="description"><?= $getPlat->description;?></div>
            </section>

            <section id="galerie">
                <h3 style="color: green;text-decoration:underline;text-transform:capitalize"><?= $getPlat->nom;?> en images</h3>
                <div class="imgbox">
                <img src="../<?= $getPlat->image1;?>" alt="<?= $getPlat->nom;?>" class="illustration">
                <img src="../<?= $getPlat->image2;?>" alt="<?= $getPlat->nom;?>" class="illustration">
                <img src="../<?= $getPlat->image3;?>" alt="<?= $getPlat->nom;?>" class="illustration">
                </div>
            </section>

            <a href="/Projet/Tourisme/#plat" class="back">Retour</a>

        <?php endif;?>
    

        <?php if(!empty($getCulture)):?>

            <section class="details">
                <h1 class="nom"><?= $getCulture->nom;?></h1>
                <img src="../<?= $getCulture->image;?>" alt="<?= $getCulture->nom;?>" class="image">
                <div class="description"><?= $getCulture->description;?></div>
            </section>

            <section id="galerie">
                <h3 style="color: green;text-decoration:underline;text-transform:capitalize"><?= $getCulture->nom;?> en images</h3>
                <div class="imgbox">
                <img src="../<?= $getCulture->image1;?>" alt="<?= $getCulture->nom;?>" class="illustration">
                <img src="../<?= $getCulture->image2;?>" alt="<?= $getCulture->nom;?>" class="illustration">
                <img src="../<?= $getCulture->image3;?>" alt="<?= $getCulture->nom;?>" class="illustration">
                </div>
            </section>

            <a href="/Projet/Tourisme/#culture" class="back">Retour</a>

        <?php endif;?>

    </div>
    

</body>
<script src="../assets/script/script.js"></script>
</html>