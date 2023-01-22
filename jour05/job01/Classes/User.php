<?php


    class User {

        private $SQL;

        private $id;

        public $name;

        public $surname;

        public $email;

        private $password;
        

        public function __construct() {

            try {

                $this->SQL = new PDO('mysql:host=localhost;dbname=runtrack js;charset=utf8', 'root','');
            
                //$this->SQL = new PDO('mysql:host=localhost;dbname=alexandre-aloesode_memory;charset=utf8', 'Namrod','azertyAZERTY123!');
            
                $this->SQL->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
                }
            
            catch (PDOException $e) {
            
                echo 'Echec de la connexion : ' . $e->getMessage();
                
                exit;
            }
            
        }

        public function register() {

            $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $request_add_user = "INSERT INTO users (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)";

            $query_add_user = $this->SQL->prepare($request_add_user);

            $query_add_user->execute(array(':prenom' => $_POST['name'], ':nom' => $_POST['surname'], ':email' => $_POST['email'], ':password' => $this->password));
        }
        

        public function login() {
            
            $request_fetch_users = "SELECT * FROM users WHERE prenom = '$_POST[name]'";

            $query_fetch_users = $this->SQL->prepare($request_fetch_users);

            $query_fetch_users->execute();

            $result_fetch_users = $query_fetch_users->fetchAll();

            if(password_verify($_POST['password'], $result_fetch_users[0][4])) {

                $_SESSION['user'] = $result_fetch_users[0][1];

            }
        //Je souhaite connecter directement l'utilisateur qui crée son compte, les lignes suivantes me permettent de récupérer son id
            if(isset($_SESSION['user']) && !isset($_SESSION['userID'])) {

                $request_ID_user = "SELECT id FROM users WHERE prenom = '$_SESSION[user]'";

                $query_ID_user = $this->SQL->prepare($request_ID_user);
                $query_ID_user->execute();

                $result_ID_user = $query_ID_user->fetchAll();

                $_SESSION['userID'] = $result_ID_user[0][0];
            }
        }
    }
?>