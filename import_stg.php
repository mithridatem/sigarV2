<?php
    include './view/menu.php';
    include './view/view_import_stg.php';
    // Connect to database
    include './utils/connectBdd.php';
    include './model/stagiaires.php';
    //test si un fichier à été importé
    if (isset($_POST["import"])) {
        //déclaration d'un nouvel objet stagiaire
        $stagiaire = new Stagiaires();
        //variable qui stocke le fichier csv
        $fileName = $_FILES["file"]["tmp_name"];
        //test existence du fichier *.csv
        if ($_FILES["file"]["size"] > 0) {
          //ouverture du fichier *.csv
          $file = fopen($fileName, "r");
          //parcour du fichier et ajout des valeurs dans la BDD
          while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            //insertion des stagaires en BDD
            $stagiaire->addStagiaire($bdd, $column[0], $column[1]);
          }
        }
      }
      


?>