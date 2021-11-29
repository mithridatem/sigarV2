<?php
    class Admin{
        /*-----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/
        private $id_adm;
        private $name_adm;
        private $pseudo_adm;
        private $mdp_adm;
        /*-----------------------------------------------------
                            Getters and Setters :
        -----------------------------------------------------*/
        //id_adm Getter and Setter
        public function getIdAdmin()
        {
            return $this->id_adm;
        }
        public function setIdAdmin($newIdAdm)
        {
            $this->id_adm = $newIdAdm;
        }
        //name_adm Getter and Setter
        public function getNameAdmin()
        {
            return $this->name_adm;
        }
        public function setNameAdmin($newNameAdm)
        {
            $this->name_adm = $newNameAdm;
        }
        //pseudo_adm Getter and Setter
        public function getPseudoAdmin()
        {
            return $this->pseudo_adm;
        }
        public function setPseudoAdmin($newPseudoAdm)
        {
            $this->pseudo_adm = $newPseudoAdm;
        }
        //mdp_adm Getter and Setter
        public function getMdpAdmin()
        {
            return $this->mdp_adm;
        }
        public function setMdpAdmin($newMdpAdm)
        {
            $this->mdp_adm = $newMdpAdm;
        }
        /*-----------------------------------------------------
                            Méthodes :
        -----------------------------------------------------*/
        /*-----------------------------------------------------
                            Fonctions :
        -----------------------------------------------------*/
        //methode chiffrage d'un mot du mot de passe en md5 :
            public function cryptMdp(){
                $this->setMdpAdmin(md5($this->getMdpAdmin()));
            }     
            //méthode ajout d'un utilisateur en bdd
            public function createAdmin($bdd, $name_adm, $pseudo_adm, $mdp_adm)
            {   
                //récuparation des valeurs de l'objet
                // $name_adm = $this->getNameAdmin();
                // $pseudo_adm = $this->getPseudoAdmin();
                // $mdp_adm = $this->getMdpAdmin();
                try
                {   
                    //requête ajout d'un utilisateur
                    $req = $bdd->prepare('INSERT INTO admin(name_adm, pseudo_adm, mdp_adm) VALUES (:name_adm, :pseudo_adm, :mdp_adm)');
                    //éxécution de la requête SQL
                    $req->execute(array(
                    'name_adm' => $name_adm,
                    'pseudo_adm' => $pseudo_adm,
                    'mdp_adm' => $mdp_adm,                                                           
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