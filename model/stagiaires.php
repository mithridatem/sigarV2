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
    }





?>