<?php

    try {

    $bdd = new PDO('mysql:host=localhost;dbname=runtrack js;charset=utf8', 'root','');

    //$this->bdd = new PDO('mysql:host=localhost;dbname=alexandre-aloesode_memory;charset=utf8', 'Namrod','azertyAZERTY123!');

    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }

    catch (PDOException $e) {

        echo 'Echec de la connexion : ' . $e->getMessage();
        
        exit;
    }

    $request = "SELECT * FROM utilisateurs";

    $query = $bdd->prepare($request);

    $query->execute();

    $result_query = $query->fetchAll();
    
    // var_dump($result_query);

    echo json_encode($result_query);

    // var_dump($result_query);    



?>