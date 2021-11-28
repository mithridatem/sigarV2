<?php 
    // Connect to database
    include './utils/connectBdd.php';
    include './model/stagiaires.php';
    include './model/session.php';
    include './view/menu.php';
    include './view/view_import_stg.php';
   

    //test si un fichier à été importé et une session à été sélectionnée
    if(isset($_POST["import"]) AND $_POST['id_session']){
        $id = $_POST['id_session'];
        //déclaration d'un nouvel objet stagiaire
        $stagiaire = new Stagiaires();
        //variable qui stocke le fichier csv
        $fileName = $_FILES["file"]["tmp_name"];
        //test si le fichier *.csv existe
        if($_FILES["file"]["size"] > 0){
            //ouverture du fichier *.csv
            $file = fopen($fileName, "r");
            //parcour du fichier *.csv et ajout des valeurs dans la table stagiaire
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE){
                //insertion des stagaires en BDD (table stagiaire)
                $stagiaire->addStagiaire($bdd, $column[0], $column[1], $id);
            }
        }
    }
?>