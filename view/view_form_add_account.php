<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./script/script.js" defer></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="./script/modal.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Créer un compte formateur</title>
</head>
<body>
    <h2>Créer un compte Formateur :</h2>
    <form action="" method="post">
        <h3>Saisir votre Nom :<h3>
        <input type="text" name="name_form" class="input"><br>
        <h3>Saisir votre Prénom :<h3>
        <input type="text" name="first_name_form" class="input"><br>
        <h3>Saisir votre Login :<h3>
        <input type="text" name="pseudo_form" class="input"><br>
        <h3>Saisir votre Mot de passe :<h3>
        <input type="password" name="mdp_form" class="input"><br>
        <h3>Confirmer votre Mot de passe :<h3>
        <input type="password" name="confirm_mdp_form" class="input"><br>
        <br>
        <input type="submit" value="Créer" class="input">        
    </form>
</body>
</html>