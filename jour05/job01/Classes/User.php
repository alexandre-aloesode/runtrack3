<?php


    class User {

        private $SQL;

        private $id;

        public $name;

        public $surname;

        public $email;

        private $password;

        private $check;


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

            $this->check = 1;

            if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['password']) ||
             trim($_POST['name']) == '' || trim($_POST['surname']) == '' || trim($_POST['email']) == '' || trim($_POST['password']) == '') {

                echo json_encode(["success" => false, "type" => "general", "message" => "Certains champs sont vides."]);
                    
                $this->check = 0;

            }

    
            if($this->check == 1 && $_POST['password'] !== $_POST['verify_password']) {

                echo json_encode(["success" => false, "type" => "general", "message" => "Les mots de passe ne correspondent pas."]);
    
                $this->check = 0;
            }

    
            if($this->check == 1) {
    
                $request_check_login= "SELECT prenom FROM users";
    
                $query_check_login = $this->SQL->prepare($request_check_login);
                $query_check_login->execute();
    
                $result_check_login = $query_check_login->fetchAll();

                $name_taken = 0;

                $email_taken = 0;
    
                for($x = 0; isset($result_check_login[$x]); $x++ ) {

                        if($result_check_login[$x][0] == $_POST['name']) {
    
                            $this->check = 0 ;

                            $name_taken = 1;
                        }
                }

                $request_check_email= "SELECT email FROM users";
    
                $query_check_email = $this->SQL->prepare($request_check_email);
                $query_check_email->execute();
    
                $result_check_email = $query_check_email->fetchAll();
    
                for($y = 0; isset($result_check_email[$y]); $y++ ) {

                        if($result_check_email[$y][0] == $_POST['email']) {
    
                            $this->check = 0 ;
                
                            $email_taken = 1;
                        }
                }

                if($name_taken == 1 && $email_taken == 0) {

                    echo json_encode(["success" => false, "type" => "name", "message" => "Ce prénom est déjà pris."]);
                }

                if($name_taken == 0 && $email_taken == 1) {

                    echo json_encode(["success" => false, "type" => "email", "message" => "Cet email est déjà pris."]);
                }

                if($name_taken == 1 && $email_taken == 1) {

                    echo json_encode(["success" => false, "type" => "name_email"]);
                }
            }       

            if($this->check == 1) {

                $this->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $request_add_user = "INSERT INTO users (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)";

                $query_add_user = $this->SQL->prepare($request_add_user);

                $result_add_user = $query_add_user->execute(array(':prenom' => $_POST['name'], ':nom' => $_POST['surname'], ':email' => $_POST['email'], ':password' => $this->password));

                if($result_add_user) {

                    echo json_encode(["success" => true, "message" => "Compte créé avec succès"]);
                }

                else {

                    echo json_encode(["success" => false, "type" => "server", "message" => "Problème serveur"]);
                }
            }
        }
        

        public function login() {
            
            $request_fetch_user = "SELECT * FROM users WHERE prenom = :prenom";

            $query_fetch_user = $this->SQL->prepare($request_fetch_user);

            $query_fetch_user->execute(["prenom" => $_POST['login_name']]);

            $result_fetch_user = $query_fetch_user->fetchAll();

            if(empty($result_fetch_user)) {

                echo json_encode(["success" => false, "message" => "Identifiant ou mot de passe erronné"]);
            
            }

            else {

                if(password_verify($_POST['login_password'], $result_fetch_user[0][4])) {

                    if(session_id() == '') session_start();

                    $_SESSION['userID'] = $result_fetch_user[0][0];

                    $_SESSION['user'] = $result_fetch_user[0][1];

                    echo json_encode(["success" => true, "message" => "Connexion réussie"]);

                }

                elseif(!password_verify($_POST['login_password'], $result_fetch_user[0][4])) {

                    echo json_encode(["success" => false, "message" => "Identifiant ou mot de passe erronné"]);
                }

                else {

                    echo json_encode(["success" => false, "message" => "Problème serveur"]);
                }  
            }
        }
    }


    if(isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $_POST['verify_password'])) {

        $user = new User();

        $user->register();
    }

    if(isset($_POST['login_name'], $_POST['login_password'])) {

        $user = new User();

        $user->login();
    }


    //Je souhaite connecter directement l'utilisateur qui crée son compte, les lignes suivantes me permettent de récupérer son id
    // if(isset($_SESSION['user']) && !isset($_SESSION['userID'])) {

    //     $request_ID_user = "SELECT id FROM users WHERE prenom = '$_SESSION[user]'";

    //     $query_ID_user = $this->SQL->prepare($request_ID_user);
    //     $query_ID_user->execute();

    //     $result_ID_user = $query_ID_user->fetchAll();

    //     $_SESSION['userID'] = $result_ID_user[0][0];
    // }
?>