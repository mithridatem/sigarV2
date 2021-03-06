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
    include './model/form.php';
    include './model/cours.php';
    include './view/form_menu.php';
    include './view/view_form_all_session.php';
    /*-----------------------------------------------------
                        Tests :
    -----------------------------------------------------*/
    if(isset($_POST['date_filter']) AND isset($_POST['crenaux_cours'])){
        $date = $_POST['date_filter'];
        $cours = new Cours();
        $heure = $_POST['crenaux_cours'];
        $cours->showAllCours($bdd, $date, $heure);
    }
    else{
        $date = date("Y-m-d");
        $cours = new Cours();
        $heure = "AM";
        $cours->showAllCours($bdd, $date, $heure);
    }
?>