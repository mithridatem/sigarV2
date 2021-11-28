<header>   
    <nav>
        <div class="subnav">
            <img src="./img/menu.svg"  class="burgerButton" width="40px">
            <div>
                <h1>SIGAR</h1>
                <img src="./img/logonum.png" id="securise"> 
            </div>
        </div>
        <ul>
<?php
    /*-----------------------------------------------------
                        Menu dynamique :
        -----------------------------------------------------*/
    //si l'utilisateur est connecté (connexion, ajouter categorie, ajouter tâche, deconnexion)
    /* if(isset($_SESSION['connected']))
    {
        echo '
            <a href="./index.php"><li>Connexion</li></a>          
            <a href="./add_cat.php"><li>Ajouter une categorie</li></a>
            <a href="./add_task.php"><li>Ajouter une tâche</li></a>
            <a href="./show_task.php"><li>Afficher les tâches</li></a>
            <a href="./deconnected.php"><li>Deconnexion</li></a>';
    }
    //si l'utilisateur n'est pas connecté (connexion, ajouter compte, deconnexion)  
    else
    {
        echo '
            <a href="./index.php"><li>Connexion</li></a>
            <a href="./add_user.php"><li>Ajouter compte</li></a>
            <a href="./deconnected.php"><li>Deconnexion</li></a>';  
    } */

?>      
        <a href="./index.php"><li>Connexion</li></a>
        <a href="./createSession.php"><li>Créer une session</li></a>
        <a href="./import_stg.php"><li>Importer les stagiaires</li></a>
        <a href="./addCours.php"><li>Ajouter les cours</li></a>
        <a href="./deconnected.php"><li>Deconnexion</li></a>';       
        </ul>            
    </nav>
</header>