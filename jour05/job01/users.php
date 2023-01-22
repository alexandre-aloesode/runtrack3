
<?php 

    try {

        $SQL = new PDO('mysql:host=localhost;dbname=runtrack js;charset=utf8', 'root','');

        //$this->SQL = new PDO('mysql:host=localhost;dbname=alexandre-aloesode_memory;charset=utf8', 'Namrod','azertyAZERTY123!');

        $SQL->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }

    catch (PDOException $e) {

        echo 'Echec de la connexion : ' . $e->getMessage();
        
        exit;
    }



    $request_fetch_users = "SELECT * FROM users";

    $query_fetch_users = $SQL->prepare($request_fetch_users);

    $query_fetch_users->execute();

    $result_fetch_users = $query_fetch_users->fetchAll();

    echo json_encode($result_fetch_users);

?>