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
    <title>Suivi Absences Hebdo</title>
</head>
<body>
    <h2>Liste des stagiaires absents pour la semaine N° <span id="sem"></span> :</h2>
    <form action="" method="post">
        <h3>Sélectionner le mois et la session :</h3>
        <div>
        <input type="date" name="date">
        <select name="tag" id="tag">
            <?php 
            $session = new Session();
            $session->generateMenu2($bdd);
            ?>
        </select>
        </div>
        <br>
        <input type="submit" value="Afficher">
    </form>
        <h3>Liste des stagiaires absents : </h3>
        <?php
            if(isset($_POST['date']) AND isset($_POST['tag'])){
                $myDate = $_POST['date'];
                //variable numero de semaine
                $sem = date('W', strtotime($myDate));
                //affichage du numéro de la semaine
                echo '<script>
                   let sem = document.getElementById("sem");
                   sem.innerHTML = '.$sem.';
                </script>';
                $tag = $_POST['tag'];
                $date = date('W', strtotime("$myDate"));
                $cours = new Cours;
                $cours->showAbsHebdoFilter($bdd, $date, $tag);
            }
            else{
                //variable numero de semaine
                $sem = date("W");
                //affichage du numéro de la semaine
                echo '<script>
                   let sem = document.getElementById("sem");
                   sem.innerHTML = '.$sem.';
                </script>';
                $week = date('W');
                $cours = new Cours;
                $cours->showAbsHebdo($bdd, $week);
            }           
        ?>
    <p id="message"></p>
</body>
</html>