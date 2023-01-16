<!-- Créez une fonction “jourtravaille” qui prend en paramètre une date au format Date. Si la
date correspond à un jour férié de l’année 2020, la fonction affiche “Le $jour $mois
$année est un jour férié”. Si elle correspond à un samedi ou un dimanche, alors le
message affiché est “Non, $jour $mois $année est un week-end”, sinon afficher “Oui,
$jour $mois $année est un jour travaillé”. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job07</title>
    <script src="script.js"></script>
</head>

<body>

        <label>Sélectionnez une date</label>

        <input type="date" id="date_input">

        <button type="submit" id="date_button" onclick="get_input_date()">Soumettre</button>
    
</body>
</html>