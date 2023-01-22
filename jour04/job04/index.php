<!-- Créez une base de données “utilisateurs” contenant une table “utilisateurs” et ayant
comme champs “id”, “nom”, “prenom” et “email”.
Ajoutez des utilisateurs directement dans phpmyadmin.
Créez une page users.php qui se connecte à la base de données, récupère l’ensemble
des utilisateurs et affiche ces informations au format json.
Dans votre page index.php, créez un tableau <table> permettant de contenir ces
informations ainsi qu’un <button> “update”. Lorsque l’on clique sur ce bouton, le tableau
doit se mettre à jour et contenir l’ensemble des informations des utilisateurs présents
dans la base de données.
Vous pouvez tester votre code en ajoutant/supprimant des utilisateurs à l’aide de
phpmyadmin entre deux clics.-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Job04</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>

        </tbody>
    </table>

    <button type="submit">Update</button>

</body>
</html>