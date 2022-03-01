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

        #content .gray
        {
            filter: grayscale(100%);
        }

        #content p
        {
            margin: 0;
            text-align: left;
            font-size: 1.3rem;
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

            <p>Les premiers Européens à pénétrer le pays sont les navigateurs portugais, longeant les côtes africaines, à la recherche de la route vers l'Inde. Les Français baptisent le pays "Côte d'Ivoire" pour l'accueil fait par les populations. Les Européens sont d'abord frappés par la force démographique des Noirs. 
            <br> La dénomination de « Côte d'Ivoire » est la traduction en français du nom portugais de Costa do Marfim donné par les commerçants navigateurs en route vers l’Inde, qui apparaît sur les portulans portugais à la fin du xviie siècle.</p>

            <img src="assets/images/ivoire.jpeg" alt="ivoire éléphant" class="gray">

            <p><strong> 1842 est signé le traité de protectorat de Grand-Bassam.</strong>
            <br> <strong> En 1843, l'expédition de Côte d'Ivoire est une expédition navale américaine contre le peuple béréby.</strong>
            <br> La Côte d'Ivoire devient <strong> officiellement une colonie française le 10 mars 1893</strong>. Le capitaine Binger, qui partit de Dakar pour rallier Kong, où il rencontra Louis Marie Marcel Treich-Laplène (un commis d'Arthur Verdier), fut le premier gouverneur. La capitale était à Grand-Bassam. </p>
            <p>En 1919, le territoire sud de la Haute Volta (actuel Burkina Faso) devient une partie de la Côte d’Ivoire coloniale. (Au moment de l’indépendance des états africains les deux pays étaient prêts et s’étaient mis d’accord à faire du Burkina Faso et de la Côte d’Ivoire un seul et même unique pays). Mais ce projet n’a pas pu aboutir, au dernier moment le Burkina Faso devient indépendant le 5 août 1960 sous l’impulsion de Maurice Yaméogo.</p>
            <p><strong>La première école de côte d’ivoire fut créée par Arthur Verdier</strong>, navigateur et commerçant français, s’installant à Assinie en 1862. En 1880, il crée une plantation de café à Élima, au bord de la lagune Aby. Il va ensuite ouvrir une <strong>école privée en 1882</strong> à Élima, celle qui fut la toute première pour les besoins de son commerce et de ses plantations</p>

            <img src="assets/images/ruine.jpg" alt="première école" title="ruine de la toute première école" class="gray">

            <p><strong>En octobre 1985, le gouvernement ivoirien a demandé à tous les pays d'utiliser comme dénomination officielle le nom en français de « Côte d'Ivoire »</strong> (de manière similaire aux noms de certains pays qui ne sont pas traduits comme Costa Rica, Sierra Leone, etc.). Ce nom officiel s’écrit sans trait d'union, faisant exception, comme certains autres noms de pays, aux règles de la typographie française qui prescrivent habituellement, pour la graphie des noms d’unités administratives ou politiques, des traits d’union entre les différents éléments d’un nom composé, et une majuscule à tous les éléments (sauf articles…) ce qui donnerait normalement « Côte-d'Ivoire ».</p>

            <p>La Côte d’Ivoire a aussi communément été appelée <strong>la « terre d'Éburnie »</strong>, qui désigne la partie forestière du pays. À l'indépendance, des propositions avaient suggéré de remplacer le nom de Côte d'Ivoire, considéré comme trop colonial, par celui d'« Eburnea ».</p>

            <p>En décembre 1958, la Côte d'Ivoire devient une république autonome par le référendum, qui crée la Communauté française entre la France et ses anciennes colonies. Elle est alors dirigée par un premier ministre, Auguste Denise, auquel succédera <strong>Félix Houphouët-Boigny en avril 1959</strong>.
            <br> Avec cette autonomie la Côte d'Ivoire ne devait plus partager ses richesses avec les autres colonies pauvres du Sahel, le budget de l'administration ivoirienne augmenta ainsi de 152 %. <strong>Le 7 août 1960 l'indépendance prend effet.</strong></p>

            <img src="assets/images/houphouet.webp" alt="président Houphoüet" title="président Houphoüet" class="gray">

            <p>L'économie, essentiellement axée sur l'agriculture, notamment la production de café et de cacao, connaît au cours des deux premières décennies un essor exceptionnel, faisant de la Côte d'Ivoire un pays phare en Afrique de l'Ouest. En 1990, le pays traverse, outre la crise économique survenue à la fin des années 1970, des périodes de turbulence sur les plans social et politique. Ces problèmes connaissent une exacerbation à <strong>la mort de Félix Houphouët-Boigny en 1993.</strong></p>

            <p>L'adoption d'une nouvelle constitution et l'organisation de l'élection présidentielle qui, en 2000, porte au pouvoir <strong>Laurent Gbagbo</strong>, n’apaisent pas les tensions sociales et politiques, qui conduisent au déclenchement d'une <strong>crise politico-militaire le 19 septembre 2002.</strong> Après plusieurs accords de paix, l'élection présidentielle de 2010 voit la victoire <strong>d'Alassane Ouattara</strong> face à son opposant Laurent Gbagbo. Réélu en 2015, Alassane Ouattara relance la croissance économique par une politique libérale et interventionniste tout en étant critiqué pour sa gestion de l'armée et de la justice.</p>

            <div id="flex">
                <img src="assets/images/gbagbo.jpeg" alt="président Gbagbo" title="Ex-président Koudou Laurent Gbagbo" class="gray">
                <img src="assets/images/ado.jpeg" alt="président ADO" title="Président Allassane Dramane Ouattara" class="gray">
            </div>

            <p>En 2016, une nouvelle constitution est adoptée, marquant l'avènement de la <strong>Troisième République.</strong> Cette nouvelle constitution a subi des modifications le 17 mars 2020.</br>
            <strong>La Côte d'Ivoire est en voie de développement et se place en 162e position selon son indice de développement humain (IDH) en 2019.</strong>
            </p>

            <a href="/Projet/Tourisme/" class="back">Retour</a>

        </section>
        
    </div>
</body>
<script src="assets/script/script.js"></script>
</html>