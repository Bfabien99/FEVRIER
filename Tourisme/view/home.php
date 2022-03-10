<?php

    function reduce(string $content, int $limit = 100){
        if(mb_strlen($content) <= $limit){
            return $content;
        }
        $lastSpace = mb_strpos($content, ' ',$limit);
        return mb_substr($content, 0, $lastSpace).' ...';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>My Country</title>
</head>
<body>
    
    <?php include 'layouts/navbar.php';?>

    <div class="main">
<!--  PETITE PRESENTATION DE LA COTE D'IVOIRE -->
        <section class="intro">
            <h1>Ma Côte d'Ivoire</h1>
            <p>Officiellement <strong>République de Côte d'Ivoire (RCI)</strong> , est un État situé en Afrique, dans la partie occidentale du golfe de Guinée. Elle présente sensiblement la forme d'un carré d'environ <strong>600 kilomètres de côté</strong>. D’une superficie de <strong> 322 462 km<sup>2</sup></strong>, elle est bordée au nord-ouest par le Mali, au nord-est par le Burkina Faso, à l'est par le Ghana, au sud-ouest par le Liberia, à l'ouest-nord-ouest par la Guinée et au sud par l’océan Atlantique.</p>
            <p><strong>La population est estimée à 28 088 455 habitants en 2021</strong>. La Côte d'Ivoire a pour capitale politique et administrative <strong>Yamoussoukro</strong> mais la quasi-totalité des institutions se trouvent à <strong>Abidjan</strong>, son principal centre économique. Sa langue officielle est le français, mais quelque <strong>70 langues et dialectes sont parlés au quotidien</strong>. Sa monnaie est le franc CFA. Le pays fait partie de la CEDEAO, de l'Union africaine et de l'Organisation de la coopération islamique.</p>
            <hr width="200px" style="background-color: orangered;">
            <h3 style="color:green; text-align:justify;">La Côte d'Ivoire est une destination touristique avec beaucoup de potentiel qui vaut le détour.<br>
            Son patrimoine culturel, ses monuments et son histoire constituent une foule de curiosités à explorer.</h3>
        </section>

        <hr width="200px" style="background-color: orangered;">

<!-- AFFICHAGE DES LIEUX -->
        <section class="lieu" id="lieu">

            <h1><span class="accent">D</span>ES <span class="accent">E</span>NDROITS <span class="accent">F</span>EERIQUES</h1>

            <?php if(!empty($getAllLieux)):?>

                <div class="contents">

                    <?php foreach($getAllLieux as $lieu):?>

                        <div class="box">
                            <h3><?= $lieu->nom ?></h3>
                            <img src="<?= $lieu->image ?>" alt="<?= $lieu->nom ?>">
                            <p><?= htmlentities(strip_tags(reduce($lieu->description,200))) ?></p>
                            <a href="more/<?= $lieu->nom ?>#main" class="more">Voir plus</a>
                        </div>

                    <?php endforeach;?>

                </div>

            <?php endif;?>

        </section>

        <hr width="200px" style="background-color: orangered;">

<!-- AFFICHAGE DES PLATS -->
        <section class="plat" id="plat">

            <h1><span class="accent">D</span>ES <span class="accent">P</span>LATS <span class="accent">M</span>ADE <span  style="color: green;">IN</span> <span class="accent">C</span>ÔTE <span class="accent">D</span>'IVOIRE</h1>

            <?php if(!empty($getAllPlat)):?>

                <div class="contents">

                    <?php foreach($getAllPlat as $plat):?>

                        <div class="box">
                            <h3><?= $plat->nom ?></h3>
                            <img src="<?= $plat->image ?>" alt="<?= $plat->nom ?>">
                            <p><?= htmlentities(strip_tags(reduce($plat->description))) ?></p>
                            <a href="more/<?= $plat->nom ?>#main" class="more">Voir plus</a>
                        </div>

                    <?php endforeach;?>

                </div>

            <?php endif;?>

        </section>

        <hr width="200px" style="background-color: orangered;">
        
<!-- AFFICHAGE DE LA CULTURE -->
        <section class="culture" id="culture">

            <h1> <span class="accent">U</span>NE <span class="accent">C</span>ULTURE <span class="accent">R</span>ICHE</h1>

            <?php if(!empty($getAllCulture)):?>

                <div class="contents">

                    <?php foreach($getAllCulture as $culture):?>

                        <div class="box">

                            <h3><?= $culture->nom ?></h3>
                            <img src="<?= $culture->image ?>" alt="<?= $culture->nom ?>">
                            <p><?= htmlentities(strip_tags(reduce($culture->description))) ?></p>

                            <a href="more/<?= $culture->nom ?>#main" class="more">Voir plus</a>

                        </div>

                    <?php endforeach;?>

                </div>

            <?php endif;?>

        </section>

    </div>

    <?php include 'layouts/footer.php';?>
</body>
<script src="assets/script/script.js"></script>
</html>