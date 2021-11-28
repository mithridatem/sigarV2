<?php
    class Session{
        /*-----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/
        private $id_session;
        private $name_session;
        /*-----------------------------------------------------
                            Getters And Setters:
        -----------------------------------------------------*/
        //id_session Getter and Setter
        public function getIdSession()
        {
            return $this->id_session;
        }
        public function setIdSession($newIdSession)
        {
            $this->id_session = $newIdSession;
        }
        //name_session Getter and Setter
        public function getNameSession()
        {
            return $this->name_session;
        }
        public function setNameSession($newNameSession)
        {
            $this->name_session = $newNameSession;
        }
        /*-----------------------------------------------------
                            Méthodes:
        -----------------------------------------------------*/
        //fonction création d'une session:
        public function createSession($bdd){
            $name = $this->name_session;
            try
            {   
                //requête ajout d'un utilisateur
                $req = $bdd->prepare('INSERT INTO session(name_session) 
                VALUES (:name_session)');
                //éxécution de la requête SQL
                $req->execute(array(
                'name_session' => $name,
            ));
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
        }
        //afficher nom de la session
        public function showNameSession($bdd, $id){
            try
            {                   
               //requête pour stocker le contenu de toute la table task dans le tableau $donnees
               $reponse = $bdd->query('SELECT name_session FROM session where id_session= '.$id.'');
               //parcours du résultat de la requête
               while($donnees = $reponse->fetch())
               {   
                  return $donnees['name_session'];
               }                
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
    
        }
        //fonction afficher la liste des sessions (menu déroulant):
        public function generateMenu($bdd)
        {      
            try
            {                   
               //requête pour stocker le contenu de toute la table task dans le tableau $donnees
               $reponse = $bdd->query('SELECT * FROM session');
               //parcours du résultat de la requête
               while($donnees = $reponse->fetch())
               {   
                  //liste deroulante <select> html
                  echo '<option value="'.$donnees['id_session'].'">'.$donnees['name_session'].'</option>';
               }                
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
        }

    }



?>