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
    include './model/module.php';
    include './model/stagiaires.php';
    include './view/form_menu.php';
    include './view/view_form_show_seance.php';
    /*-----------------------------------------------------
                        Tests :
    -----------------------------------------------------*/
    if(isset($_POST['id_mod'])){
        if(isset($_POST['id_stg']))
        {   
            // boucle pour chaque stagiares cochées
             foreach($_POST['id_stg'] as $value)
            {   
                //requête mise à jour de le présence des stagiaires
                try
                {                   
                    //requête pour mettre à jour la table participer
                    $reponse = $bdd->query('UPDATE participer set presence = 1 where id_stg = '.$value.' and id_cours = '.$id.'');              
                }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }                     
            }
            echo '<h3>Les stagiaires sont notés présent</h3>';
        }
    }
?>