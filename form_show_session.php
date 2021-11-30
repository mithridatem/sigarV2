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
    $cours = new Cours();
    $date = date("Y-m-d");
    $cours->showAllCours($bdd, $date);
?>