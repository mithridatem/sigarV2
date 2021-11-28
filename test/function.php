<?php
    function addCours($tag, $date, $creneau){
        include 'connectBdd.php';
        try
            {   
                //requête ajout d'un utilisateur
                $req = $bdd->prepare('INSERT INTO cours(tag_cours, date_cours, crenaux_cours) 
                VALUES (:tag_cours, :date_cours, :crenaux_cours)');
                //éxécution de la requête SQL
                $req->execute(array(
                'tag_cours' => $tag,
                'date_cours' => $date,
                'crenaux_cours' => $creneau,
            ));
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
    }



?>