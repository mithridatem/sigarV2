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
        $tag = $_POST['tag'];
        $numMonthPre = $numMonth -1 ;
        $currentAbs = $cours->showAbscurrentMonth($bdd, $tag, $numMonth);
        $pastAbs = $cours->showAbscurrentMonth($bdd, $tag, $numMonthPre);
        if($currentAbs>$pastAbs){
            echo '<p>'.$tag.' Absences totale du mois précédent : <span>'.$pastAbs.'</span> 
            Absences totale du mois de '.$tabMonth[$numMonth-1].' : <span id="alert">'.$currentAbs.'</span></p>';
        }
        else{
            echo '<p>'.$tag.' Absences totale du mois précédent : <span>'.$pastAbs.'</span> 
            Absences totale du mois de '.$tabMonth[$numMonth-1].' : <span id="noAlert">'.$currentAbs.'</span></p>';
        }
        
    }
   else{
       $cours->showAbscurrentMonthAll($bdd, date('m'));
   }

?>