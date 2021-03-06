<?php
    class Cours{
        /*-----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/
        private $id_cours;
        private $tag_cours;
        private $date_cours;
        private $crenaux_cours;
        private $id_mod = null;
        /*-----------------------------------------------------
                            Getters And Setters:
        -----------------------------------------------------*/
        //id_cours Getter and Setter
        public function getIdCours()
        {
            return $this->id_cours;
        }
        public function setIdCours($newIdcours)
        {
            $this->id_cours = $newIdcours;
        }
        //tag_cours Getter and Setter
        public function getTagCours()
        {
            return $this->tag_cours;
        }
        public function setTagCours($newTagCours)
        {
            $this->tag_cours = $newTagCours;
        }
        //date_cours Getter and Setter
        public function getDateCours()
        {
            return $this->date_cours;
        }
        public function setDateCours($newDateCours)
        {
            $this->date_cours = $newDateCours;
        }
        //crenaux_cours Getter and Setter
        public function getCrenauxCours()
        {
            return $this->crenaux_cours;
        }
        public function setCrenauxCours($newCrenauxCours)
        {
            $this->crenaux_cours = $newCrenauxCours;
        }
        /*-----------------------------------------------------
                            Méthodes :
        -----------------------------------------------------*/
        //fonction ajout des cours
        public function addCours($bdd, $tag, $crenaux){
            
            $date= $this->date_cours;
            try
            {   
                //requête ajout d'un utilisateur
                $req = $bdd->prepare('INSERT INTO cours(tag_cours, date_cours, crenaux_cours) 
                VALUES (:tag_cours, :date_cours, :crenaux_cours)');
                //éxécution de la requête SQL
                $req->execute(array(
                'tag_cours' => $tag,
                'date_cours' => $date,
                'crenaux_cours' => $crenaux,
            ));
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
        }
        //fonction affecter cours (ajouter les stagaires)
        public function affectcours($bdd, $value)
        {
            try
            {
                //requete pour update le statut de la tache = 1 (true)
                $req = $bdd->query('INSERT INTO participer SET validate_task = 1 Where id_task ='.$value.'');
                 //redirection vers show_task.php
                 header("Location: show_task.php");
            }
            catch(Exception $e)
            {   //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
        //Fonction afficher les cours d'une session:
        public function showCours($bdd, $session){
            try
            {
                $req = $bdd->prepare('select id_cours from cours where tag_cours = $session');
                //éxécution de la requête SQL
                $req->execute(array(
                'tag_cours' => $tag,
                'date_cours' => $date,
                'crenaux_cours' => $crenaux,
            ));
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            } 
        }
        //afficher les tous les cours :
        public function showAllCours($bdd, $date, $heure){
            
                try
                {
                    //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                    $reponse = $bdd->query('SELECT id_cours, tag_cours, crenaux_cours, date_cours FROM cours WHERE 
                    date_cours = "'.$date.'" AND crenaux_cours = "'.$heure.'"');
                    //parcours du résultat de la requête
                    while($donnees = $reponse->fetch())
                    {   if($donnees['crenaux_cours'] == 'AM'){
                        $crenaux = 'Matin';
                        $dateFr = strftime("%e/%m/%Y",strtotime($donnees['date_cours']));
                        echo '<p><a href="./form_show_seance.php?id_cours='.$donnees['id_cours'].'">'.$donnees['tag_cours'].' '.$dateFr.' 
                        '.$crenaux.'</a></p>';
                        }
                        else{
                            $crenaux = 'Après-Midi';
                            $dateFr = strftime("%e/%m/%Y",strtotime($donnees['date_cours']));
                            echo '<p><a href="./form_show_seance.php?id_cours='.$donnees['id_cours'].'">'.$donnees['tag_cours'].' '.$dateFr.' 
                            '.$crenaux.'</a></p>';
                        }
                        
                    } 
                }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
            
            
             
        }
        public function showAbscurrentMonth($bdd, $tag, $dateDeb, $dDay)
        {
            try
            {
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT COUNT(id_stg) AS nbrAbs FROM participer INNER JOIN cours WHERE 
                participer.id_cours = cours.id_cours AND cours.tag_cours = "'.$tag.'" 
                AND cours.date_cours BETWEEN "'.$dateDeb.'" AND "'.$dDay.'" and presence IS null');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                   return $donnees['nbrAbs'];
                } 
            }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
        public function showAllAbsByMonth($bdd, $tag, $month)
        {
            try
            {
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT COUNT(id_stg) AS nbrAbs FROM participer INNER JOIN cours WHERE 
                participer.id_cours = cours.id_cours AND cours.tag_cours = "'.$tag.'" 
                AND MONTH(cours.date_cours) = '.$month.' AND participer.presence IS NULL');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                   return $donnees['nbrAbs'];
                } 
            }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
        public function showAbscurrentMonthAll($bdd, $dateDeb, $dDays)
        {
            try
            {
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT COUNT(id_stg) AS nbrAbs, cours.tag_cours as tag  
                FROM participer INNER JOIN cours WHERE  participer.id_cours = cours.id_cours 
                AND cours.date_cours BETWEEN "'.$dateDeb.'" AND "'.$dDays.'" AND presence IS NULL GROUP BY cours.tag_cours;');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                    echo '<p>'.$donnees['tag'].' -Absences totale du mois : '.$donnees['nbrAbs'].' demi-journées</p>';
                } 
            }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
        //fonction afficher tous les absents d'une semaine
        public function showAbsHebdo($bdd, $week)
        {
            try
            {
                echo '<table>
                <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Session</th>
                <th>Date</th>
                <th>Créneau horaire</th>
                </tr>';
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT stagiaire.name_stg AS nom, stagiaire.prenom_stg AS prenom, 
                cours.tag_cours AS tag, cours.date_cours AS date_cours, cours.crenaux_cours AS creneau
                FROM `participer` INNER JOIN stagiaire, 
                cours WHERE participer.id_stg = stagiaire.id_stg AND 
                participer.id_cours = cours.id_cours 
                AND presence IS NULL AND week(cours.date_cours) = '.$week.' 
                ORDER BY cours.date_cours, cours.tag_cours;');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                    echo '<tr>
                    <td>'.$donnees['nom'].'</td>
                    <td>'.$donnees['prenom'].'</td>
                    <td>'.$donnees['tag'].'</td>
                    <td>'.$donnees['date_cours'].'</td>
                    <td>'.$donnees['creneau'].'</td>
                    </tr>';
                }
                echo '</table>';
            }
            catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
        //fonction afficher tous les absents d'une semaine filtré par semaine et session
        public function showAbsHebdoFilter($bdd, $date, $tag)
        {
            try
            {   
                echo '<table>
                <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Session</th>
                <th>Date</th>
                <th>Créneau horaire</th>
                </tr>';
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT stagiaire.name_stg AS nom, stagiaire.prenom_stg AS prenom, 
                cours.tag_cours AS tag, cours.date_cours AS date_cours, cours.crenaux_cours AS creneau
                FROM `participer` INNER JOIN stagiaire, 
                cours WHERE participer.id_stg = stagiaire.id_stg AND 
                participer.id_cours = cours.id_cours 
                AND presence IS NULL AND week(cours.date_cours) = '.$date.' AND cours.tag_cours = "'.$tag.'"
                ORDER BY cours.date_cours, cours.tag_cours;');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                    echo '<tr>
                    <td>'.$donnees['nom'].'</td>
                    <td>'.$donnees['prenom'].'</td>
                    <td>'.$donnees['tag'].'</td>
                    <td>'.$donnees['date_cours'].'</td>
                    <td>'.$donnees['creneau'].'</td>
                    </tr>';
                }
                echo '</table>';
            }
            catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }



        //Fonction afficher les cours d'une session:
        public function showComCours($bdd, $id_cours){
            try
                {
                    //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                    $reponse = $bdd->query('SELECT com_cours FROM cours WHERE id_cours = '.$id_cours.'');
                    //parcours du résultat de la requête
                    while($donnees = $reponse->fetch())
                    {   
                        echo $donnees['com_cours'];
                    }
                }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
        //Fonction afficher les cours d'une session:
        public function showComCoursJson($bdd){
            try
                {
                    //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                    $reponse = $bdd->query('SELECT * FROM cours WHERE id_cours > 4 AND id_cours <= 9');
                    //parcours du résultat de la requête
                    //Initialiser un tableau
                    $data = $reponse->fetchAll(PDO::FETCH_ASSOC);
                    
                    print_r(json_encode($data));
                }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
        public function showComCoursJsonV2($bdd){
            try
                {
                    //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                    $reponse = $bdd->query('SELECT * FROM cours WHERE id_cours > 4 AND id_cours <= 9');
                    //parcours du résultat de la requête
                    //Initialiser un tableau
                    $data = array();
                    //Récupérer les lignes
                    while ($row = $reponse->fetchAll(PDO::FETCH_ASSOC)){
                        $data[] = $row;
                    }
                    //Afficher le tableau au format JSON
                    echo json_encode($data);
                }
                catch(Exception $e)
                {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }
        }
    }
?>