<?php
require "./assets/core/header.php";


if (isset($_POST['title']) && isset($_POST['contenu']) && !empty($_FILES['image']['name'])) {
    // Récupération des données du formulaire
    $title = $_POST['title'];
    $contenu = $_POST['contenu'];
    $image_nom = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_taille = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];
    
    // Vérification du type de fichier
    if ($image_type !== 'image/jpeg' && $image_type !== 'image/png') {
        die("Le format de l'image doit être JPEG ou PNG.");
    }
    
    // Vérification de la taille de fichier
    if ($image_taille > 10000000) {
        die("La taille de l'image ne doit pas dépasser 1 Mo.");
    }
    
    // Upload de l'image
    $image_chemin = "assets/img/" . $image_nom;
    if (!move_uploaded_file($image_temp, $image_chemin)) {
        die("Une erreur est survenue lors de l'upload de l'image.");
    }
    
    // Insertion des données dans la base de données
    try {
        $sql = "INSERT INTO article (title, contenu, image, id_ut) VALUES (:title, :contenu, :image, $id_ut);";
        
        require "./assets/core/config.php";

        $articleIns = $pdo->prepare($sql);
        $articleIns->bindParam(':title', $title);
        $articleIns->bindParam(':contenu', $contenu);
        $articleIns->bindParam(':image', $image_chemin);

        if ($articleIns->execute()) {
            echo "L'article a été ajouté avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'ajout de l'article.";
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}


?>

<main class="ea-main">
    <form method="post" enctype="multipart/form-data" class="ea-container">
        <div class="ea-title">
            <img src="./assets/img/logo-CCP2.png" alt="">
            <div class="input-title">
                <input type="text" name="title" placeholder="Titre">
            </div>
        </div>
        <input type="file" name="image">
        <div class="ea-text">
            <textarea name="contenu" cols="30" rows="10">
            </textarea>
        </div>
        <button>Valider</button>
    </form>
</main>

<?php

require "./assets/core/footer.php";

?>