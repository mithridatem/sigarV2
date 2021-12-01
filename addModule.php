<?php
    /*-----------------------------------------------------
                        Controler :
    -----------------------------------------------------*/
    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();
    include './view/menu.php';
    include './view/view_add_module.php';
    include './utils/connectBdd.php';
    include './model/module.php';

    if(isset($_POST['name_mod'])){
        $mod = new Module();
        $mod->setNameMod($_POST['name_mod']);
        $mod->createModule($bdd);
        echo '<p>création du module de formation '.$_POST['name_mod'].'</p>';
    }
    else{
        echo '<p>Veuillez compléter le nom du module de formation : </p>';
    }
?>