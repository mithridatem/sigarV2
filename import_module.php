<?php 
    /*-----------------------------------------------------
                        Controler :
    -----------------------------------------------------*/
    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();
    // Connect to database
    include './utils/connectBdd.php';
    include './model/module.php';
    include './view/menu.php';
    include './view/view_import_module.php';
   

    //test si un fichier à été importé
    if(isset($_POST["import"])){
        //déclaration d'un nouvel objet stagiaire
        $mod = new Module();
        //variable qui stocke le fichier csv
        $fileName = $_FILES["file"]["tmp_name"];
        //test si le fichier *.csv existe
        if($_FILES["file"]["size"] > 0){
            //ouverture du fichier *.csv
            $file = fopen($fileName, "r");
            //parcour du fichier *.csv et ajout des valeurs dans la table module
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE){
                //insertion des stagaires en BDD (table stagiaire)
                $mod->createModuleImport($bdd, $column[0]);
            }
        }
    }
?>