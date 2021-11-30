<?php    
    /*-----------------------------------------------------
                        Controler :
    -----------------------------------------------------*/
    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();
    /*-----------------------------------------------------
                            imports :
    -----------------------------------------------------*/
    include './utils/connectBdd.php';
    include './model/form.php';    
    include './view/form_menu.php';
    include './view/view_form_connexion.php';

    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/    
    //test si les champs sont vides
    if(!isset($_POST['pseudo_adm']) AND !isset($_POST['mdp_adm']))
    {   
       //script js récupération du paragraphe #message dans une variable "message"
       echo '<script>let message = document.querySelector("#message");';
       //script js remplacement du message
       echo 'message.innerHTML = "Veuillez remplir les champs du formulaire";';
       echo '</script>';
    }
    //test si les champs sont complétés
    if(isset($_POST['pseudo_form']) AND isset($_POST['mdp_form']))
    {
        //création des variables de connexion
        $pseudo = $_POST['pseudo_form'];
        $mdp = $_POST['mdp_form'];
        //Nouvelle instance de User
        $adm = new Admin();
        $adm->setPseudoAdmin($_POST['pseudo_form']);
        //chiffrage du mot de passe en md
        $adm->cryptMdp();

        //test si le compte existe (login)
        if($adm->showUser($bdd))
        {   
            //test si le login et le mot de passe correspondent
            if($adm->userConnnected($bdd))
            {
                //génération des super globales 
                $adm->generateSuperGlobale($bdd);                
                //test login et mot de passe correct
                if($_SESSION['connected'])
                {
                    //redirection vers index.php?connected
                    header("Location: form_index.php?connected");
                }
            }
            //test mot de passe incorrect
            else
            {
                //redirection vers index.php?mdperror
                header("Location: form_index.php?mdperror");
            }                  
        }
        //test le compte n'existe pas
        else
        {
            //redirection vers index.php?cptnoexist
            header("Location: form_index.php?cptnoexist");
        }
    }
    /*-----------------------------------------------------
                Gestion des messages d'erreurs :
    -----------------------------------------------------*/
    //test si le compte (login) n'existe pas
    if(isset($_GET['cptnoexist']))
    {   
        //script js
        echo '<script>';
         //script js remplacement du message
        echo 'message.innerHTML = "Le compte n\'existe pas !!!";';
        echo '</script>';
    }
    //test si le mot de passe est incorrect
    if(isset($_GET['mdperror']))
    {   
        //script js
        echo '<script>';
         //script js remplacement du message
        echo 'message.innerHTML = "Le mot de passe est incorrect !!!";';
        echo '</script>';
    }
     //test connexion ok
     if(isset($_GET['connected']))
     {   
        
        //script js
        echo '<script>';
        //script js remplacement du message
        echo 'message.innerHTML = "Connecté !!!";';
        echo '</script>';   
    }
    //test deconnexion
    if(isset($_GET['deconnected']))
    {   
        //script js
        echo '<script>';
        //script js remplacement du message
        echo 'message.innerHTML = "Déconnecté !!!";';
        echo '</script>';
    }     
?>