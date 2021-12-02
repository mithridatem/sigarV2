<header>   
    <nav>
        <div class="subnav">
            <img src="./img/menu.svg"  class="burgerButton" width="40px">
            <div>
                <h1>SIGAR Formateur</h1>
                <img src="./img/logonum.png" id="securise"> 
            </div>
        </div>
        <ul>
<?php
    /*-----------------------------------------------------
                        Menu dynamique :
        -----------------------------------------------------*/
    //si l'utilisateur est connecté (connexion, ajouter categorie, ajouter tâche, deconnexion)
    if(isset($_SESSION['connected']))
    {
        echo '
        <a href="./form_show_session.php"><li>Liste session</li></a>
        <a href="./form_show_absence.php"><li>Suivi absences mensuel</li></a>
        <a href="./form_deconnected.php"><li>Deconnexion</li></a>        
        ';
    }
    //si l'utilisateur n'est pas connecté (connexion, ajouter compte, deconnexion)  
    else
    {
        echo '
            <a href="./form_index.php"><li>Connexion</li></a>
            <a href="./form_addCpt.php"><li>Ajouter compte</li></a>
            ';  
    }

?>
        </ul>            
    </nav>
</header>