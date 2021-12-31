<?php
    include '../utils/connectBdd.php';
    include '../model/cours.php';
    $cours = new Cours;
    $cours->showComCoursJson($bdd);

?>