<?php

require_once "./assets/core/config.php";

// Barre de recherche pour les articles //

if(empty($_GET['s'])) {
    if(empty($_GET['s'])) {
        if ($_GET["s"] = "") {
            $s = "%";
        } else {
            $s = "%" . $_GET["s"] . "%";
        }
    
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    
        $sql = "SELECT * FROM article WHERE title LIKE :title ORDER BY title ASC;";
    
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":title", $s);
    
        if($query-> execute()) {
            $results_art = $query-> fetchAll();
            $succes = "Le listing a bien été généré, " . count($results_art) . " utilisateur(s) inscrit(s) corespond(ent) au critère !";
        } else {
            $erreur = "Une erreur s'est produite, le listing n'a pu être généré !";
            $q = str_replace("%", "", $s);
        }
    } else {
        $results_art = [];
        $s = "";
    }
} else {
    if(isset($_GET["s"])) {
        if ($_GET["s"] == "") {
            $s = "%";
        } else {
            $s = "%" . $_GET["s"] . "%";
        }
    
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    
        $sql = "SELECT * FROM article WHERE title LIKE :title ORDER BY title ASC;";
    
        $query = $pdo-> prepare($sql);
        $query-> bindParam(":title", $s);
    
        if($query-> execute()) {
            $results_art = $query-> fetchAll();
            $succes = "Le listing a bien été généré, " . count($results_art) . " utilisateur(s) inscrit(s) corespond(ent) au critère !";
        } else {
            $erreur = "Une erreur s'est produite, le listing n'a pu être généré !";
            $s = str_replace("%", "", $s);
        }
    } else {
        $results_art = [];
        $s = "";
    }
}
?>