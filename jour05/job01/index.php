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

    session_start();

    if(isset($_POST['deco'])) {
        
        session_destroy();
        header('Location: index.php');
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Job01</title>
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <a href="index.php">
                    <li id="home_page">Accueil</li>
                </a>
            </ul>
        </nav>

        <?php if(isset($_SESSION['user'])): ?>

        <nav>
            <ul>
                <li>
                    <form method="POST">
                        <button type="submit" name="deco" id="deco">Déconnexion</button>
                    </form>
                </li>   
            </ul>
        </nav>

        <?php else : ?>

        <nav>
            
            <ul>
                <li id="show_login">Connexion</li>
                <li id="show_subscribe">Inscription</li>
            </ul>
        </nav>

        <?php endif ?>

    </header>

    <?php if(!isset($_SESSION['user'])): ?>

    <form method="POST" id="login_form">

        <label id="error_login"></label>

        <input type="text" name="login_name" placeholder="Prénom">

        <input type="password" name="login_password" placeholder="Mot de passe">

        <button type="submit" id="login_btn">Connexion</button>

    </form>

    <form method="POST" id="subscribe_form">
            
        <label id="error_subscribe"></label>

        <input type="text" name="name" id="input_name" placeholder="Prénom">
        <label id="error_name"></label>

        <input type="text" name="surname" placeholder="Nom">
        <input type="text" name="email" id="input_email" placeholder="email">
        <label id="error_email"></label>

        <input type="password" name="password" placeholder="Mot de passe">
        <label id="error_password"></label>
        <input type="password" name="verify_password" placeholder="Confirmation mot de passe">

        <button type="submit" id="subscribe_btn">S'inscrire</button>


    </form>

    <?php endif ?>

</body>
</html>