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
        //méthode update task (valider une tâche)
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
        //afficher les cours :
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

    }















?>