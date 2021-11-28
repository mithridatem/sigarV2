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
        <title>import des stagiaires</title>
    </head>
    <body>
        <p class = etape>Etape 2</p>
        <h2>Importer la liste des stagiaires : </h2>
        <form enctype="multipart/form-data" action="import_stg.php" method="post">    
            <label class="col-md-4 control-label">Sélectionner un fichier CSV</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <h3>Sélectionner la session : </h3>
            <p><select name="id_session">
            <?php
                //création d'un objet category
                $session = new Session($bdd);
                //appel de la Méthode génération du menu déroulant liste des catégories
                $session->generateMenu($bdd);
            ?>
            </select></p>
            <br>
            <button type="submit" id="submit" name="import" class="btn-submit">Importer</button>
            <br />
        </form>
        <a href="addCours.php" class = "etape">Ajouter les cours -> Créer les cours (etape 3)</a>
    </body>
</html>

