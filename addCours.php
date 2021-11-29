<?php
    /*-----------------------------------------------------
                        Controler :
    -----------------------------------------------------*/
    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();
    /*-----------------------------------------------------
                            imports :
    -----------------------------------------------------*/
    include './utils/connectBdd.php';
    /*import du model */
    include './model/cours.php';
    include './model/session.php';

    /*import du menu */
    include './view/menu.php';
    /*import de la vue */
    include './view/view_add_cours.php';
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/    
    if(isset($_POST['start']) AND isset($_POST['end']) AND isset($_POST['id_session'])){
        //récupération de la date de début
        $begin = new DateTime($_POST['start']);
        //récupération de la date de début
        $end = new DateTime($_POST['end']);
        //Intervale (tout les 1 jour)
        $end = $end->modify( '+1 day' );
        $interval = new DateInterval('P1D');
        //stockage de la période (start -> End)
        $daterange = new DatePeriod($begin, $interval ,$end);
        //compteur du nombre de jours
        $cpt = 0;
        //crénaux matin et après midi
        $matin = "AM";
        $apresMidi = "PM";
        //tableau jour de la semaine en francais
        $jours = Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        
        //instanciation d'un nouvel objet cours
        $cours = new Cours();
        //récupération du tag des cours
        $session = new Session();
        $tag = $session->showNameSession($bdd, $_POST['id_session']);
        //Boucle pour création des cours
        foreach($daterange as $date){
            //test si le jour de la semaine est égal à dimanche ou lundi
            if($jours[$date->format("w")]== 'Dimanche' OR $jours[$date->format("w")]== 'Samedi'){
                //rien
            }
            //sinon les autres jours
            else{
                //incrémentation du compteur de nombre de cours créé
                $cpt++;
                //formatage de la date sous la forme : 2021-11-26
                $dDate = $date->format("Y-m-d");
                //setter tag
                $cours->setTagCours($tag);
                $cours->setDateCours($dDate);
                $cours->addCours($bdd, $tag, $matin);
                $cours->addCours($bdd, $tag, $apresMidi);
                // echo "$dDate<br>";
                // echo "$tag<br>";
                // echo "$matin<br>";
                // echo $jours[$date->format("w")];
                // echo "<br>";
                // echo "$dDate<br>";
                // echo "$tag<br>";
                // echo "$apresMidi<br>";
                // echo $jours[$date->format("w")];
                // echo "<br>";               
                // echo "$cpt<br>";
            }
        }
        echo "<p>Nombre de séances de formation (AM, PM) : $cpt</p>";
    }





?>