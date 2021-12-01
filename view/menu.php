<header>   
    <nav>
        <div class="subnav">
            <img src="./img/menu.svg"  class="burgerButton" width="40px">
            <div>
                <h1>SIGAR Backoffice</h1>
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
        <a href="./createSession.php"><li>Créer une session</li></a>
        <a href="./import_stg.php"><li>Importer les stagiaires</li></a>
        <a href="./addCours.php"><li>Ajouter les cours</li></a>
        <a href="./affectStgCours.php"><li>Affecter les stagiaires -> cours</li></a>
        <a href="./addModule.php"><li>Créer un module de formation</li></a>
        <a href="./deconnected.php"><li>Deconnexion</li></a>';
    }
    //si l'utilisateur n'est pas connecté (connexion, ajouter compte, deconnexion)  
    else
    {
        echo '
            <a href="./index.php"><li>Connexion</li></a>
            <a href="./addAdm.php"><li>Ajouter compte</li></a>
            <a href="./deconnected.php"><li>Deconnexion</li></a>';  
    }

?>      
        <!-- <a href="./index.php"><li>Connexion</li></a>
        <a href="./addAdm.php"><li>Créer un compte</li></a>
        <a href="./createSession.php"><li>Créer une session</li></a>
        <a href="./import_stg.php"><li>Importer les stagiaires</li></a>
        <a href="./addCours.php"><li>Ajouter les cours</li></a>
        <a href="./affectStgCours.php"><li>Affecter les stagiaires -> cours</li></a>
        <a href="./deconnected.php"><li>Deconnexion</li></a>';       --> 
        </ul>            
    </nav>
</header>