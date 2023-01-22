<!-- Téléchargez le fichier suivant : pokemon.json
Créez un formulaire permettant de trier ces données.
Il doit contenir les champs suivants :
● id (input type text),
● nom (input type text),
● type (liste déroulante <select>)
● filtrer (input type button).
Lorsque l’on clique sur “filtrer”, le script doit à l’aide de Fetch, récupérer le contenu du
fichier et lister les éléments répondant aux critères sélectionnés en les affichant sur une
page HTML. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Job03</title>
</head>
<body>

    <form method="get">

        <label>id</label>
        <input type="text" name="id">

        <label>Nom</label>
        <input type="text" name="name">

        <label>Type</label>
        <select name="type">
            <option selected>--</option>
        </select>
 
        <button type="submit" name="submit">Filtrer</button>
    </form>


</body>
</html>