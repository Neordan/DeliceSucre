<?php
require "./assets/core/config.php";

if (isset($_GET["s"])) {
    if ($_GET["s"] == "") {
        $q = "%";
    } else {
        $q = "%" . $_GET["s"] . "%";
    }

    $sql = "SELECT * FROM utilisateur WHERE prenom LIKE :search OR nom LIKE :search ORDER BY email ASC;";

    $query = $pdo->prepare($sql);
    $query->bindParam(":search", $q);

    if ($query->execute()) {
        $results_user = $query->fetchAll();
        $succes = "Le listing a bien été généré, " . count($results_user) . " utilisateur(s) inscrit(s) correspondent au critère !";
    } else {
        $erreur = "Une erreur s'est produite, le listing n'a pu être généré !";
        $q = str_replace("%", "", $q);
    }
} else {
    $results_user = [];
    $q = "";
}
?>