<?php
    /*-----------------------------------------------------
                            imports :
    -----------------------------------------------------*/
    include './utils/connectBdd.php';
    /*import du model */
    include './model/cours.php';
    include './model/session.php';
    include './model/stagiaires.php';

    /*import du menu */
    include './view/menu.php';
    /*import de la vue */
    include './view/view_affect_stg_cours.php';
    $stg = new stagiaires();
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    if(isset($_GET['id_session'])){
        echo '<form action="" method="post">';
        $stg->showStagiaires($bdd, $_GET['id_session']); 
        echo '<input type="submit" value="Affecter">';
        echo '</form>';
    }
    if(isset($_POST['id_stg']))
    {   
        
        
        // boucle pour chaque stagiares cochées
        foreach($_POST['id_stg'] as $value)
        {   
            $nameSession = new Session();
            $session = $_GET['id_session'];
            $name_cours = $nameSession->showNameSession($bdd, $session);
            //echo $name_cours;
             try
            {                   
            //requête pour stocker le contenu de toute la table task dans le tableau $donnees
             $reponse = $bdd->query('SELECT id_cours FROM cours where tag_cours = "'.$name_cours.'"');
           //parcours du résultat de la requête
            while($donnees = $reponse->fetch())
            {  
                $bdd->query('INSERT INTO participer(id_stg, id_cours) Values('.$value.', '.$donnees['id_cours'].')');
                  echo $value;
                  echo '<br>' ;
                  echo $donnees['id_cours'];
                  echo '<br>' ;
            }                
            }
           catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            } 


            echo isset($_GET['id_session']);
            echo '<br>';

            echo $value;
            echo '<br>';
                      
        }
    }
?>