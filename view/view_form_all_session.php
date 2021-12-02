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
    <title>Liste des sessions</title>
</head>
<body>
    <h2>Liste des sessions :</h2>
    <h3 class="etape">Cliquer sur une session pour éffectuer votre émargement</h3>
    <form action="" method="post">
        <h3 id="italic">Filtrer la liste par date et créneaux (matin, après-midi):</h3>
        <div>
            <input type="date" name="date_filter" value= <?php $date = date("Y-m-d"); echo "$date"; ?>> 
            <select id="crenaux_cours" name="crenaux_cours">
                <option value="AM"  selected>Matin</option>
                <option value="PM">Après-Midi</option>
                </select>
        </div>
        <br>
        <br>
        <input type="submit" value="Afficher">
    </form>
</body>
</html>