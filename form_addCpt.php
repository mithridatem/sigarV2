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
    include './view/form_menu.php';
    include './view/view_form_add_account.php';
    /*-----------------------------------------------------
                        Tests :
    -----------------------------------------------------*/
    if(isset($_POST['name_form']) AND isset($_POST['first_name_form'])AND isset($_POST['pseudo_form']) 
    AND isset($_POST['mdp_form']) AND $_POST['confirm_mdp_form']){
        if($_POST['mdp_form'] == $_POST['confirm_mdp_form']){
            $form = new Formateur();
            $form->setMdpForm(md5($_POST['mdp_form']));
            $mdp = $form->getMdpForm();
            $form->createForm($bdd,$_POST['name_form'], $_POST['first_name_form'], $_POST['pseudo_form'], $mdp);
            echo '<p class = "error">Le Formateur : <span id ="spanning">'.$_POST['name_form'].'  
            '.$_POST['first_name_form'].'</span> a été ajouté !!!</p>';
        }
        else{            
            echo '<p class = "error">Les mots de passe ne sont pas identiques !!!</p>';
        }
    }
    else{
        echo '<p class = "error">Veuillez remplir les champs de formulaire !!!</p>';
    }
?>