<!-- Commencez par créer une base de données “utilisateurs” contenant une table
“utilisateurs” et ayant comme champs “id”, “nom”, “prenom”, “email” et “password”.
Ensuite, créez une page d’accueil qui contient un paragraphe “Bonjour $prenom” si
l’utilisateur est connecté, sinon deux liens vers une page “inscription.php” et une page
“connexion.php”.
Ces deux pages permettent aux utilisateurs de créer un compte et de se connecter.
L’ensemble des vérifications habituelles de formulaire doivent se faire sans
rafraîchissement de la page (en JS donc).
Exemples de vérifications :
● Prénom/Nom bien renseignés,
● Mots de passe/Confirmation identiques et suffisamment complexes,
● Adresse email non déjà prise et au bon format…
Un message lié à chaque erreur doit être affiché en dessous de chaque champ du
formulaire le cas échéant.
Lorsqu’une inscription est validée, l’utilisateur est renvoyé sur la page de connexion.
Lorsqu’il se connecte, il est renvoyé vers la page d’accueil. -->


<?php 

    if(session_id() == '') session_start();

    include './Classes/User.php';

    if(isset($_POST['subscribe'])) {

        $user = new User();

        $user->register();
    }

    if(isset($_POST['login'])) {

        $user = new User();

        $user->login();
    }
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Job01</title>
</head>
<body>
    
    <header>
<?php if(isset($_SESSION['user'])) echo $_SESSION['user']?>
        <nav>
            <ul>
                <a href="index.php">
                    <li id="home_page">Accueil</li>
                </a>
            </ul>
        </nav>

        <nav>
            <?php if(!isset($_SESSION['user'])): ?>
            <ul>
                <li id="show_login">Connexion</li>
                <li id="show_subscribe">Inscription</li>
            </ul>
        </nav>

        <?php endif ?>

    </header>

    <form method="POST" id="login_form">

        <input type="text" name="name" placeholder="Prénom">

        <input type="password" name="password" placeholder="Mot de passe">

        <button type="button" id="login_btn">Connexion</button>

    </form>

    <form method="POST" id="subscribe_form">

        <input type="text" name="name" id="input_name" placeholder="Prénom">
        <input type="text" name="surname" placeholder="Nom">
        <input type="text" name="email" id="input_email" placeholder="email">

        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="verify_password" placeholder="Confirmation mot de passe">

        <button type="button" id="subscribe_btn">S'inscrire</button>


    </form>

    

</body>
</html>