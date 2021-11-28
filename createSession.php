<?php
    include './view/menu.php';
    include './view/view_create_session.php';
    include './utils/connectBdd.php';
    include './model/session.php';

    if(isset($_POST['name_session'])){
        $session = new Session();
        $session->setNameSession($_POST['name_session']);
        $session->createSession($bdd);
        echo '<p>création de la session '.$_POST['name_session'].'</p>';
    }
    else{
        echo '<p>Veuillez compléter le nom de la session : </p>';
    }
?>