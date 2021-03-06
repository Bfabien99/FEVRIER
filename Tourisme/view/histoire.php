<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
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

            <img src="assets/images/carte.jpg" alt="Carte de la C??te d'Ivoire">

            <p>Les premiers Europ??ens ?? p??n??trer le pays sont les navigateurs portugais, longeant les c??tes africaines, ?? la recherche de la route vers l'Inde. Les Fran??ais baptisent le pays "C??te d'Ivoire" pour l'accueil fait par les populations. Les Europ??ens sont d'abord frapp??s par la force d??mographique des Noirs. 
            <br> La d??nomination de ?? C??te d'Ivoire ?? est la traduction en fran??ais du nom portugais de Costa do Marfim donn?? par les commer??ants navigateurs en route vers l???Inde, qui appara??t sur les portulans portugais ?? la fin du xviie si??cle.</p>

            <img src="assets/images/ivoire.jpeg" alt="ivoire ??l??phant" class="gray">

            <p><strong> 1842 est sign?? le trait?? de protectorat de Grand-Bassam.</strong>
            <br> <strong> En 1843, l'exp??dition de C??te d'Ivoire est une exp??dition navale am??ricaine contre le peuple b??r??by.</strong>
            <br> La C??te d'Ivoire devient <strong> officiellement une colonie fran??aise le 10 mars 1893</strong>. Le capitaine Binger, qui partit de Dakar pour rallier Kong, o?? il rencontra Louis Marie Marcel Treich-Lapl??ne (un commis d'Arthur Verdier), fut le premier gouverneur. La capitale ??tait ?? Grand-Bassam. </p>
            <p>En 1919, le territoire sud de la Haute Volta (actuel Burkina Faso) devient une partie de la C??te d???Ivoire coloniale. (Au moment de l???ind??pendance des ??tats africains les deux pays ??taient pr??ts et s?????taient mis d???accord ?? faire du Burkina Faso et de la C??te d???Ivoire un seul et m??me unique pays). Mais ce projet n???a pas pu aboutir, au dernier moment le Burkina Faso devient ind??pendant le 5 ao??t 1960 sous l???impulsion de Maurice Yam??ogo.</p>
            <p><strong>La premi??re ??cole de c??te d???ivoire fut cr????e par Arthur Verdier</strong>, navigateur et commer??ant fran??ais, s???installant ?? Assinie en 1862. En 1880, il cr??e une plantation de caf?? ?? ??lima, au bord de la lagune Aby. Il va ensuite ouvrir une <strong>??cole priv??e en 1882</strong> ?? ??lima, celle qui fut la toute premi??re pour les besoins de son commerce et de ses plantations</p>

            <img src="assets/images/ruine.jpg" alt="premi??re ??cole" title="ruine de la toute premi??re ??cole" class="gray">

            <p><strong>En octobre 1985, le gouvernement ivoirien a demand?? ?? tous les pays d'utiliser comme d??nomination officielle le nom en fran??ais de ?? C??te d'Ivoire ??</strong> (de mani??re similaire aux noms de certains pays qui ne sont pas traduits comme Costa Rica, Sierra Leone, etc.). Ce nom officiel s?????crit sans trait d'union, faisant exception, comme certains autres noms de pays, aux r??gles de la typographie fran??aise qui prescrivent habituellement, pour la graphie des noms d???unit??s administratives ou politiques, des traits d???union entre les diff??rents ??l??ments d???un nom compos??, et une majuscule ?? tous les ??l??ments (sauf articles???) ce qui donnerait normalement ?? C??te-d'Ivoire ??.</p>

            <p>La C??te d???Ivoire a aussi commun??ment ??t?? appel??e <strong>la ?? terre d'??burnie ??</strong>, qui d??signe la partie foresti??re du pays. ?? l'ind??pendance, des propositions avaient sugg??r?? de remplacer le nom de C??te d'Ivoire, consid??r?? comme trop colonial, par celui d'?? Eburnea ??.</p>

            <p>En d??cembre 1958, la C??te d'Ivoire devient une r??publique autonome par le r??f??rendum, qui cr??e la Communaut?? fran??aise entre la France et ses anciennes colonies. Elle est alors dirig??e par un premier ministre, Auguste Denise, auquel succ??dera <strong>F??lix Houphou??t-Boigny en avril 1959</strong>.
            <br> Avec cette autonomie la C??te d'Ivoire ne devait plus partager ses richesses avec les autres colonies pauvres du Sahel, le budget de l'administration ivoirienne augmenta ainsi de 152 %. <strong>Le 7 ao??t 1960 l'ind??pendance prend effet.</strong></p>

            <img src="assets/images/houphouet.webp" alt="pr??sident Houpho??et" title="pr??sident Houpho??et" class="gray">

            <p>L'??conomie, essentiellement ax??e sur l'agriculture, notamment la production de caf?? et de cacao, conna??t au cours des deux premi??res d??cennies un essor exceptionnel, faisant de la C??te d'Ivoire un pays phare en Afrique de l'Ouest. En 1990, le pays traverse, outre la crise ??conomique survenue ?? la fin des ann??es 1970, des p??riodes de turbulence sur les plans social et politique. Ces probl??mes connaissent une exacerbation ?? <strong>la mort de F??lix Houphou??t-Boigny en 1993.</strong></p>

            <p>L'adoption d'une nouvelle constitution et l'organisation de l'??lection pr??sidentielle qui, en 2000, porte au pouvoir <strong>Laurent Gbagbo</strong>, n???apaisent pas les tensions sociales et politiques, qui conduisent au d??clenchement d'une <strong>crise politico-militaire le 19 septembre 2002.</strong> Apr??s plusieurs accords de paix, l'??lection pr??sidentielle de 2010 voit la victoire <strong>d'Alassane Ouattara</strong> face ?? son opposant Laurent Gbagbo. R????lu en 2015, Alassane Ouattara relance la croissance ??conomique par une politique lib??rale et interventionniste tout en ??tant critiqu?? pour sa gestion de l'arm??e et de la justice.</p>

            <div id="flex">
                <img src="assets/images/gbagbo.jpeg" alt="pr??sident Gbagbo" title="Ex-pr??sident Koudou Laurent Gbagbo" class="gray">
                <img src="assets/images/ado.jpeg" alt="pr??sident ADO" title="Pr??sident Allassane Dramane Ouattara" class="gray">
            </div>

            <p>En 2016, une nouvelle constitution est adopt??e, marquant l'av??nement de la <strong>Troisi??me R??publique.</strong> Cette nouvelle constitution a subi des modifications le 17 mars 2020.</br>
            <strong>La C??te d'Ivoire est en voie de d??veloppement et se place en 162e position selon son indice de d??veloppement humain (IDH) en 2019.</strong>
            </p>

            <a href="/Projet/Tourisme/" class="back">Retour</a>

        </section>
        
    </div>

    <?php include 'layouts/footer.php';?>
</body>
<script src="assets/script/script.js"></script>
</html>