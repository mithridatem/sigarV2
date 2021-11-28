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
    <title>Créer les cours</title>
</head>
<body>
    <p class = etape>Etape 3</p>
    <h2>Créer les cours d'une session :</h2>
    <form action="" method="post">
        <h3>Saisir la date de début des cours :</h3>
        <input type="date" name="start" id="start"><br>
        <h3>Saisir la date de fin des cours : </h3>
        <input type="date" name="end" id="end"><br>
        <h3>Saisir le nom de la session : </h3>
            <p><select name="id_session">
            <?php
                //création d'un objet category
                $session = new Session($bdd);
                //appel de la Méthode génération du menu déroulant liste des catégories
                $session->generateMenu($bdd);
            ?>
            </select></p>
        <br>
        <input type="submit" value="Ajouter">
    </form>
    <a href="affectStgCours.php" class = "etape">Affecter les stagiaires -> cours (etape 4)</a>
</body>
</html>