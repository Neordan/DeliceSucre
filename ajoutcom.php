<?php
session_start();

//vérifier si id de l'article et le message est posté
if (isset($_POST['id_art']) && isset($_POST['message'])) {
    // On récupère les données
    $id_art = htmlspecialchars($_POST['id_art']);
    $message = htmlspecialchars($_POST['message']);
     // l'utilisateur est connecté ? et est ce qu'il a le bon rôle
    if (isset($_SESSION['utilisateur']['id_ut']) && (($_SESSION['utilisateur']['role'] === 'utilisateur') || ($_SESSION['utilisateur']['role'] === 'editeur') || ($_SESSION['utilisateur']['role'] === 'admin'))) {

        // on récupère l'id de la session utilisateur
        $id_ut = $_SESSION['utilisateur']['id_ut'];

        require_once "./assets/core/config.php";
        // Requête pour insérer le commentaire dans la bdd
        $sql = "INSERT INTO commentaire (message, id_art, id_ut) VALUES (:message, :id_art, :id_ut)";
        //Préparation de la requête
        $coms = $pdo->prepare($sql);
        $coms->bindParam(":message", $message);
        $coms->bindParam(":id_art", $id_art);
        $coms->bindParam(":id_ut", $id_ut);
        // Exécution de la requète
        $coms->execute();

        // Redirection vers la page de l'article
    -    header("Location: ./articlePage.php?id_art=" . $id_art);
        exit();
    } else {
        echo "Vous n'êtes pas connecté ni avez le bon rôle pour ajouter un commentaire.";
    }
} else {
    echo "Erreur";
}
?>