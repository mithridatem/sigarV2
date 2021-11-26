<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>créer une session</title>
</head>
<body>
    <h2>Créer les cours d'une session :</h2>
    <form action="" method="post">
        <label for="start">Saisir la date de début des cours :</label><br>
        <input type="date" name="start" id="start"><br>
        <label for="end">Saisir la date de fin des cours : </label><br>
        <input type="date" name="end" id="end"><br>
        <label for="tag_cours">Saisir le nom de la session</label><br>
        <input type="text" name="tag_cours" id="session"><br>
        <br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
<?php
    /*-----------------------------------------------------
    fichier de test création de cours multiple dans la BDD:
    -----------------------------------------------------*/
    include 'connectBdd.php';
    include 'function.php';
    
    if(isset($_POST['start']) AND isset($_POST['end']) AND isset($_POST['tag_cours'])){
        $begin = new DateTime($_POST['start']);
        $end = new DateTime($_POST['end']);
        $end = $end->modify( '+1 day' );
        
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);
        $cpt = 0;
        $matin = "AM";
        $apresMidi = "PM";
        $jours = Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $tag = $_POST['tag_cours'];
        
        foreach($daterange as $date){
            if($jours[$date->format("w")]== 'Dimanche' OR $jours[$date->format("w")]== 'Samedi'){

            }
            else{
                $cpt++;
                $dDate = $date->format("Y-m-d");
                addCours($tag, $dDate, $matin);
                addCours($tag, $dDate, $apresMidi);
                echo "$dDate<br>";
                echo "$tag<br>";
                echo "$matin<br>";
                echo $jours[$date->format("w")];
                echo "<br>";
                echo "$dDate<br>";
                echo "$tag<br>";
                echo "$apresMidi<br>";
                echo $jours[$date->format("w")];
                echo "<br>";               
                echo "$cpt<br>";
            }
            
        }
        echo "nbr de jours = $cpt";
        

    }

?>