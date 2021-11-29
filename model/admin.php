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
            //méthode pour vérifier si un utilisateur existe dans la bdd
        public function showUser($bdd)
        {
             //récuparation des valeurs de l'objet       
             $pseudo_adm = $this->getPseudoAdmin();        
             try
             {                   
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT * FROM admin WHERE pseudo_adm = "'.$pseudo_adm.'" 
                 LIMIT 1');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                   //return $donnees['mdp_user'];
                    if($pseudo_adm == $donnees['pseudo_adm'])
                    {
                        //retourne true si il existe
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }                
             }
             catch(Exception $e)
             {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
             }        
        }
        //méthode qui génére les super globales avec les valeurs d'attributs d'un utilisateur en bdd
        public function generateSuperGlobale($bdd)
        {
            //récuparation des valeurs de l'objet       
            $pseudo_adm = $this->getPseudoAdmin();        
            $mdp_adm = $this->getMdpAdmin();        
            try
            {                   
               //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
               $reponse = $bdd->query('SELECT * FROM admin WHERE pseudo_adm = "'.$pseudo_adm.'" AND mdp_adm = "'.$mdp_adm.'" LIMIT 1');
               //parcours du résultat de la requête
               while($donnees = $reponse->fetch())
               {   
                  //return $donnees['mdp_user'];
                   if($pseudo_adm == $donnees['pseudo_adm'] AND $mdp_adm == $donnees['mdp_adm'])
                   {
                        $id =  $donnees['id_adm'];
                        $name =  $donnees['name_adm'];
                        $pseudo =  $donnees['pseudo_adm'];
                        $mdp =  $donnees['mdp_adm'];
                        //création des super globales Session                
                        $_SESSION['idAdm'] =  $id;
                        $_SESSION['nameAdm'] = $name;
                        $_SESSION['pseudoAdm'] = $pseudo;
                        $_SESSION['mdpAdm'] = $mdp;
                        $_SESSION['connected'] = true;
                   }
               }                
            }
            catch(Exception $e)
            {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }   
        }
         
        //méthode pour tester la connexion d'un utilisateur
        public function userConnnected($bdd)
        {
             //récuparation des valeurs de l'objet       
             $pseudo_adm = $this->getPseudoAdmin();        
             $mdp_adm = $this->getMdpAdmin();        
             try
             {                   
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT * FROM admin WHERE pseudo_adm = "'.$pseudo_adm.'" 
                AND mdp_adm = "'.$mdp_adm.'" LIMIT 1');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                   //return $donnees['mdp_user'];
                    if($pseudo_adm == $donnees['pseudo_adm'] AND $mdp_adm == $donnees['mdp_adm'])
                    {
                        //retourne true si il existe (pseudo et mdp)
                        return true;
                    }
                    else
                    {
                        return false;
                    }
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