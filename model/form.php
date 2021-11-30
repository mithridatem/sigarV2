<?php
    class Formateur{
        private $id_form;
        private $name_form;
        private $first_name_form;
        private $pseudo_form;
        private $mdp_form;
        /*-----------------------------------------------------
                            Getters and Setters :
        -----------------------------------------------------*/
        //id_form Getter and Setter
        public function getIdForm()
        {
            return $this->id_form;
        }
        public function setIdForm($newIdForm)
        {
            $this->id_form = $newIdForm;
        }
        //name_form Getter and Setter
        public function getNameForm()
        {
            return $this->name_form;
        }
        public function setNameForm($newNameForm)
        {
            $this->name_form = $newNameForm;
        }
        //first_name_form Getter and Setter
        public function getFirstNameForm()
        {
            return $this->first_name_form;
        }
        public function setFirstNameForm($newFirstNameForm)
        {
            $this->first_name_form = $newFirstNameForm;
        }
        
        //pseudo_form Getter and Setter
        public function getPseudoForm()
        {
            return $this->pseudo_form;
        }
        public function setPseudoForm($newPseudoForm)
        {
            $this->pseudo_form = $newPseudoForm;
        }
        //mdp_form Getter and Setter
        public function getMdpForm()
        {
            return $this->mdp_form;
        }
        public function setMdpForm($newMdpform)
        {
            $this->mdp_form = $newMdpform;
        }
        /*-----------------------------------------------------
                            Méthodes :
        -----------------------------------------------------*/
        //methode chiffrage d'un mot du mot de passe en md5 :
        public function cryptMdp(){
            $this->setMdpForm(md5($this->getMdpForm()));
        }     
        //méthode ajout d'un utilisateur en bdd
        public function createForm($bdd, $name_form, $first_name_form, $pseudo_form, $mdp_form)
        {   
            try
            {   
                //requête ajout d'un utilisateur
                $req = $bdd->prepare('INSERT INTO formateur(name_form, first_name_form, pseudo_form, mdp_form) 
                VALUES (:name_form, :first_name_form, :pseudo_form, :mdp_form)');
                //éxécution de la requête SQL
                $req->execute(array(
                'name_form' => $name_form,
                'first_name_form' => $first_name_form,
                'pseudo_form' => $pseudo_form,
                'mdp_form' => $mdp_form,                                                           
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
             $pseudo_form = $this->getPseudoForm();        
             try
             {                   
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT * FROM formateur WHERE pseudo_form = "'.$pseudo_form.'" 
                 LIMIT 1');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                   //return $donnees['mdp_user'];
                    if($pseudo_form == $donnees['pseudo_form'])
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
            $pseudo_form = $this->getPseudoForm();        
            $mdp_form = $this->getMdpForm();        
            try
            {                   
               //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
               $reponse = $bdd->query('SELECT * FROM formateur WHERE pseudo_form = "'.$pseudo_form.'" AND 
               mdp_form = "'.$mdp_form.'" LIMIT 1');
               //parcours du résultat de la requête
               while($donnees = $reponse->fetch())
               {   
                  //return $donnees['mdp_user'];
                   if($pseudo_form == $donnees['pseudo_form'] AND $mdp_form == $donnees['mdp_form'])
                   {
                        $id =  $donnees['id_form'];
                        $name =  $donnees['name_form'];
                        $firstName =  $donnees['first_name_form'];
                        $pseudo =  $donnees['pseudo_form'];
                        $mdp =  $donnees['mdp_form'];
                        //création des super globales Session                
                        $_SESSION['idForm'] =  $id;
                        $_SESSION['nameForm'] = $name;
                        $_SESSION['firstNameForm'] = $firstName;
                        $_SESSION['pseudoForm'] = $pseudo;
                        $_SESSION['mdpForm'] = $mdp;
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
             $pseudo_form = $this->getPseudoForm();        
             $mdp_form = $this->getMdpForm();        
             try
             {                   
                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $reponse = $bdd->query('SELECT mdp_form FROM formateur WHERE pseudo_form = "'.$pseudo_form.'"');
                //parcours du résultat de la requête
                while($donnees = $reponse->fetch())
                {   
                   return $donnees['mdp_form'];
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