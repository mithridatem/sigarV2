<?php    
    /*-----------------------------------------------------
                        Controler :
    -----------------------------------------------------*/
    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();
    /*-----------------------------------------------------
                        Imports :
    -----------------------------------------------------*/
    include './utils/connectBdd.php';
    include './model/cours.php';
    include './model/session.php';
    include './view/form_menu.php';
    include './view/view_form_show_abs.php';

    /*-----------------------------------------------------
                        Tests :
    -----------------------------------------------------*/
    $cours = new Cours();
    $absCurMonth;
    $absPreMonth;
    $numMonth = 0;
    $tag;
    $tabMonth = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre');
    if(isset($_POST['numMonth']) AND isset($_POST['tag'])){
        $numMonth = $_POST['numMonth'];
        $dDay = date('Y-m-d');
        $year = date('Y');
        $month = date('m');
        $tag = $_POST['tag'];
        $dateDeb = "$year-$numMonth-01";
        $numMonthPre = $numMonth -1 ;
        //$currentAbs = $cours->showAbscurrentMonth($bdd, $tag, $dateDeb, $dDay);
        $currentAbs = $cours->showAllAbsByMonth($bdd, $tag, $numMonth);
        $pastAbs = $cours->showAllAbsByMonth($bdd, $tag, $numMonthPre);
        if($numMonth == 1){
            $pastAbs = $cours->showAllAbsByMonth($bdd, $tag, 12);
            $currentAbs = $cours->showAbscurrentMonth($bdd, $tag, $dateDeb, $dDay);
            echo '<p>Nombres d\'absences (demi-journées) : </p>';
            echo '<p>Session : '.$tag.' Absences totales du mois prédédent : <span>'.$pastAbs.'</span> 
            Absences totale du mois de '.$tabMonth[0].' : <span id="alert">'.$currentAbs.'</span></p>';
        }
        //test si le mois est le mois courant affichage du nombre d'absence du 1 à la date du jours
        else if($numMonth == $month){
            $currentAbs = $cours->showAbscurrentMonth($bdd, $tag, $dateDeb, $dDay);
            echo '<p>Nombres d\'absences (demi-journées) : </p>';
            echo '<p>Session : '.$tag.' Absences totales du mois prédédent : <span>'.$pastAbs.'</span> 
            Absences totale du mois de '.$tabMonth[$numMonth-1].' : <span id="alert">'.$currentAbs.'</span></p>';
        }
        //test sinon affichage du total d'absences stagiaires du mois entier
        else{
            //test si les absences du mois sont supérieure au mois précédent
            if($currentAbs>$pastAbs){
            echo '<p>Nombres d\'absences (demi-journées) : </p>';
            echo '<p>Session : '.$tag.' Absences totales du mois prédédent : <span>'.$pastAbs.'</span> 
            Absences totale du mois de '.$tabMonth[$numMonth-1].' : <span id="alert">'.$currentAbs.'</span></p>';
            }
            //sinon affiche en vert les abences du mois courant
            else{
            echo '<p>Nombres d\'absences (demi-journées) : </p>';
            echo '<p>Session : '.$tag.' Absences totales du mois prédédent : <span>'.$pastAbs.'</span> 
            Absences totale du mois de '.$tabMonth[$numMonth-1].' : <span id="noAlert">'.$currentAbs.'</span></p>';
            }  
        }
          
    }
   else{
        $dDay = date('Y-m-d');
        $year = date('Y');
        $numMonth = date('m');
        $datedeb = "$year-$numMonth-01";
        $cours->showAbscurrentMonthAll($bdd, $datedeb, $dDay);
        //$cours->showAbscurrentMonthAll($bdd, '2022-01-03', '2022-01-06');
   }

?>