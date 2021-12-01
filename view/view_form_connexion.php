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
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion :</h2>
    <form action="" method="post">
        <h3>Saisir votre login :</h3>
        <input type="text" name="pseudo_form" id="login"><br>
        <h3>Saisir votre mot de passe : </h3>
        <input type="password" name="mdp_form" id="mdp"><br>
        <br>
        <input type="submit" value="Connexion">
    </form>
    <p id="message"></p>
</body>