<?php   
    //connexion à la base de données
    //(à modifier en fonction de votre base de données dans mon cas la bdd l'appele task1)
    $bdd = new PDO('mysql:host=localhost:3306;dbname=test_sigar', 'root','root', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>