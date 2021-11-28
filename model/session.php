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

    }



?>