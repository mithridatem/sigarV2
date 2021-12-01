<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./script/script.js" defer></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="./script/modal.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Emargement</title>
</head>
<body>
    <h2>Effectuer l'émargement du cours :</h2>
    <h3 class="etape">Etape 1 -> Sélectionner un module dans la liste : </h3>
    <form action="./form_show_seance.php?id_cours=<?php echo $_GET['id_cours']?>" method="post">
        

        <p><select name="id_mod">
            <?php
                //création d'un objet category
                $mod = new Module($bdd);
                //appel de la Méthode génération du menu déroulant liste des catégories
                $mod->generateMenu($bdd);
            ?>
            </select></p>
            <h3 class="etape">Etape 2 -> Cocher les stagiaires présents : </h3>
            <?php
            if(isset($_GET['id_cours'])){
                $id = $_GET['id_cours'];
            }
            $stg = new Stagiaires();
            $stg->showStagiairesFromCours($bdd, $id);
            ?>
            <br><input type="submit" value="Emarger">
    </form>
    
</body>
</html>