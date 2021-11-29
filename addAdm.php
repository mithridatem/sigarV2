<?php
    /*-----------------------------------------------------
                        Imports :
    -----------------------------------------------------*/
    include './utils/connectBdd.php';
    include './model/admin.php';

    include './view/menu.php';
    include './view/view_add_adm.php';
    /*-----------------------------------------------------
                        Tests :
    -----------------------------------------------------*/
    
    if(isset($_POST['name_adm']) AND isset($_POST['pseudo_adm']) 
    AND isset($_POST['mdp_adm']) AND $_POST['confirm_mdp_adm']){
        if($_POST['mdp_adm'] == $_POST['confirm_mdp_adm']){
            $adm = new Admin();
            $adm->cryptMdp();
            $adm->setNameAdmin($_POST['name_adm']);
            $adm->setPseudoAdmin($_POST['pseudo_adm']);
            $mdp = $adm->getMdpAdmin();
            $adm->createAdmin($bdd,$_POST['name_adm'], $_POST['pseudo_adm'], $mdp);
            echo '<p class = "error">L\'admin : '.$_POST['name_adm'].' a été ajouté !!!</p>';
        }
        else{            
            echo '<p class = "error">Les mots de passe ne sont pas identiques !!!</p>';
        }
    }
    else{
        echo '<p class = "error">Veuillez remplir les champs de formulaire !!!</p>';
    }
?>