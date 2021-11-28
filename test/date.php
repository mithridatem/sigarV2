<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test boucle date</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="deb" id="deb">
        <input type="date" name="fin" id="fin">
        <input type="submit" value="Afficher">
    </form>
</body>
</html>
<?php
    if(isset($_POST['deb']) AND isset($_POST['fin'])){
        $begin = new DateTime($_POST['deb']);
        $end = new DateTime($_POST['fin']);
        $end = $end->modify( '+1 day' );
        
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);
        $cpt = 0;
        $jours = Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        foreach($daterange as $date){
            if($jours[$date->format("w")]== 'Dimanche' OR $jours[$date->format("w")]== 'Samedi'){

            }
            else{
                $cpt++;
                echo $date->format("Y-m-d") . "<br>";
                echo $jours[$date->format("w")];
                echo "<br>";                
                echo "$cpt<br>";
            }
            
        }
        echo "nbr de jours = $cpt";
    }
    



?>