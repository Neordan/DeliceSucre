<?php

require_once "./assets/core/config.php";

// Barre de recherche pour les utilisateurs //

if(empty($_GET['q'])) {
    if(empty($_GET['q'])) {
        if ($_GET["q"] = "") {
            $q = "%";
        } else {
            $q = "%" . $_GET["q"] . "%";
        }
    
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    
        $sql = "SELECT * FROM utilisateur WHERE email LIKE :email ORDER BY email ASC;";
    
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":email", $q);
    
        if($query-> execute()) {
            $results_user = $query-> fetchAll();
            $succes = "Le listing a bien été généré, " . count($results_user) . " utilisateur(s) inscrit(s) corespond(ent) au critère !";
        } else {
            $erreur = "Une erreur s'est produite, le listing n'a pu être généré !";
            $q = str_replace("%", "", $q);
        }
    } else {
        $results_user = [];
        $q = "";
    }
} else {
    if(isset($_GET["q"])) {
        if ($_GET["q"] == "") {
            $q = "%";
        } else {
            $q = "%" . $_GET["q"] . "%";
        }
    
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    
        $sql = "SELECT * FROM utilisateur WHERE email LIKE :email ORDER BY email ASC;";
    
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":email", $q);
    
        if($query-> execute()) {
            $results_user = $query-> fetchAll();
            $succes = "Le listing a bien été généré, " . count($results_user) . " utilisateur(s) inscrit(s) corespond(ent) au critère !";
        } else {
            $erreur = "Une erreur s'est produite, le listing n'a pu être généré !";
            $q = str_replace("%", "", $q);
        }
    } else {
        $results_user = [];
        $q = "";
    }
}

?>