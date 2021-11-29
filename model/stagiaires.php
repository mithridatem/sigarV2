<?php
    class Stagiaires{
        /*-----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/
        private $id_stg;
        private $name_stg;
        private $prenom_stg;
        private $id_session = null;
        /*-----------------------------------------------------
                            Getters And Setters:
        -----------------------------------------------------*/
        //id_stg Getter and Setter
        public function getIdStg()
        {
            return $this->id_stg;
        }
        public function setIdCours($newIdStg)
        {
            $this->id_stg = $newIdStg;
        }
        /*-----------------------------------------------------
                            Méthodes:
        -----------------------------------------------------*/
        public function addStagiaire($bdd, $name, $prenom, $id){
            try
            {   
                //requête ajout d'un utilisateur
                $req = $bdd->prepare('INSERT INTO stagiaire(name_stg, prenom_stg, id_session) 
                VALUES (:name_stg, :prenom_stg, :id_session)');
                //éxécution de la requête SQL
                $req->execute(array(
                'name_stg' => $name,
                'prenom_stg' => $prenom,
                'id_session' => $id,

            ));
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
        }
        //afficher les stagiaires d'une session :
        public function showStagiaires($bdd, $idSession){
           try
           {   //requête qui récupére toutes les tâches non terminées d'un utilisateur
               $reponse = $bdd->query('SELECT * FROM `stagiaire` WHERE  id_session = '.$idSession.'');
               //boucle pour parcourir et afficher le contenu de chaque ligne de la requete
               while ($donnees = $reponse->fetch())
               {   
                    if($donnees['prenom_stg'] =="" ){

                    }
                    else{
                        //affichage du contenu de la requete
                        echo '<p><input type="checkbox" name="id_stg[]" value="'.$donnees['id_stg'].'"/>
                        N° : '.$donnees['id_stg'].' Nom : '.$donnees['name_stg'].' Prenom : '.$donnees['prenom_stg'].'</p>';       
                    }                                  
               }
           }
           catch(Exception $e)
           {   //affichage d'une exception
               die('Erreur : '.$e->getMessage());
           }
        }
    }





?>