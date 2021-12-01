<?php
 class Module{
    /*-----------------------------------------------------
                            Attributs :
    -----------------------------------------------------*/
    private $id_mod;
    private $name_mod;
    /*-----------------------------------------------------
                        Getters and setters :
    -----------------------------------------------------*/
    //id_cours Getter and Setter
    public function getIdMod()
    {
        return $this->id_mod;
    }
    public function setIdMod($newIdMod)
    {
        $this->id_mod = $newIdMod;
    }
    //tag_cours Getter and Setter
    public function getNameMod()
    {
        return $this->name_mod;
    }
    public function setNameMod($newNameMod)
    {
        $this->name_mod = $newNameMod;
    }
    /*-----------------------------------------------------
                            Méthodes :
    -----------------------------------------------------*/
    //fonction création d'un module :
    public function createModule($bdd){
        $name = $this->name_mod;
        try
        {   
            //requête ajout d'un utilisateur
            $req = $bdd->prepare('INSERT INTO module(name_mod) 
            VALUES (:name_mod)');
            //éxécution de la requête SQL
            $req->execute(array(
            'name_mod' => $name,
        ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //afficher nom du module
    public function showNameModule($bdd, $id){
        try
        {                   
           //requête pour stocker le contenu de toute la table task dans le tableau $donnees
           $reponse = $bdd->query('SELECT name_mod FROM module where id_mod= '.$id.'');
           //parcours du résultat de la requête
           while($donnees = $reponse->fetch())
           {   
              return $donnees['name_mod'];
           }                
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }

    }
    //fonction afficher la liste des modules (menu déroulant):
    public function generateMenu($bdd)
    {      
        try
        {                   
           //requête pour stocker le contenu de toute la table task dans le tableau $donnees
           $reponse = $bdd->query('SELECT * FROM module');
           //parcours du résultat de la requête
           while($donnees = $reponse->fetch())
           {   
              //liste deroulante <select> html
              echo '<option value="'.$donnees['id_mod'].'">'.$donnees['name_mod'].'</option>';
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