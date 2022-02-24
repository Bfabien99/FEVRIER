<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <title>Mon Histoire</title>
    <style>
        #content
        {
            width: 80%;
        }

        #content img
        {
            width: 100%;
            object-fit: contain;
            height: 400px;
        }

        #flex
        {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        #flex img
        {
            width: 48%;
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
            background-color: orange;
        }


        @media (max-width:900px)
        {
            img
            {
                width: 80%;
                border: none;
                box-shadow: none;
            }

            #flex
            {
                display: flex;
                flex-direction: column;
                gap: 1em;
            }

            #flex img
            {
                width: 100%;
            }

            .back
            {
                width: 50%;
            }

        }

    </style>
</head>
<body>
    
    <?php include 'layouts/navbar.php';?>

    <div class="main" id="histoire">

        <section id="content">

            <h1 style="color: green;text-decoration:underline">Mon Histoire</h1>

            <img src="assets/images/carte.jpg" alt="Carte de la Côte d'Ivoire">

            <p>La dénomination de « Côte d'Ivoire » est la traduction en français du nom portugais de Costa do Marfim donné par les commerçants navigateurs en route vers l’Inde, qui apparaît sur les portulans portugais à la fin du xviie siècle.</p>

            <img src="assets/images/ivoire.jpeg" alt="Carte de la Côte d'Ivoire">
            
            <p>En octobre 1985, le gouvernement ivoirien a demandé à tous les pays d'utiliser comme dénomination officielle le nom en français de « Côte d'Ivoire » (de manière similaire aux noms de certains pays qui ne sont pas traduits comme Costa Rica, Sierra Leone, etc.). Ce nom officiel s’écrit sans trait d'union, faisant exception, comme certains autres noms de pays, aux règles de la typographie française qui prescrivent habituellement, pour la graphie des noms d’unités administratives ou politiques, des traits d’union entre les différents éléments d’un nom composé, et une majuscule à tous les éléments (sauf articles…) ce qui donnerait normalement « Côte-d'Ivoire ».</p>

            <p>La Côte d’Ivoire a aussi communément été appelée la « terre d'Éburnie », qui désigne la partie forestière du pays. À l'indépendance, des propositions avaient suggéré de remplacer le nom de Côte d'Ivoire, considéré comme trop colonial, par celui d'« Eburnea ».</p>

            <p>D'abord protectorat français en 1843 puis colonie française le 10 mars 1893, le pays acquiert son indépendance le 7 août 1960, sous la houlette de Félix Houphouët-Boigny, premier président de la République.</p>

            <img src="assets/images/houphouet.webp" alt="président Houphoüet" title="président Houphoüet">

            <p>L'économie, essentiellement axée sur l'agriculture, notamment la production de café et de cacao, connaît au cours des deux premières décennies un essor exceptionnel, faisant de la Côte d'Ivoire un pays phare en Afrique de l'Ouest. En 1990, le pays traverse, outre la crise économique survenue à la fin des années 1970, des périodes de turbulence sur les plans social et politique. Ces problèmes connaissent une exacerbation à la mort de Félix Houphouët-Boigny en 1993.</p>

            <p>L'adoption d'une nouvelle constitution et l'organisation de l'élection présidentielle qui, en 2000, porte au pouvoir Laurent Gbagbo, n’apaisent pas les tensions sociales et politiques, qui conduisent au déclenchement d'une crise politico-militaire le 19 septembre 2002. Après plusieurs accords de paix, l'élection présidentielle de 2010 voit la victoire d'Alassane Ouattara face à son opposant Laurent Gbagbo. Réélu en 2015, Alassane Ouattara relance la croissance économique par une politique libérale et interventionniste tout en étant critiqué pour sa gestion de l'armée et de la justice.</p>

            <div id="flex">
                <img src="assets/images/gbagbo.jpeg" alt="président Gbagbo" title="Ex-président Koudou Laurent Gbagbo">
                <img src="assets/images/ado.jpeg" alt="président ADO" title="Président Allassane Dramane Ouattara">
            </div>

            <p>En 2016, une nouvelle constitution est adoptée, marquant l'avènement de la Troisième République. Cette nouvelle constitution a subi des modifications le 17 mars 2020.</br>
            La Côte d'Ivoire est en voie de développement et se place en 162e position selon son indice de développement humain (IDH) en 2019.
            </p>

            <a href="/Projet/Tourisme/" class="back">Retour</a>

        </section>
        
    </div>
</body>
<script src="assets/script/script.js"></script>
</html>