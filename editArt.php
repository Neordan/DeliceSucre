<?php
require "./assets/core/header.php";
session_start();


if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['contenu']) && !empty($_FILES['image']['name'])) {
    // Récupération des données du formulaire
    $title = htmlSpecialChars(trim(($_POST['title'])));
    $description = htmlSpecialChars(trim($_POST['description']));
    $contenu = htmlSpecialChars(trim($_POST['contenu']));
    $image_nom = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_taille = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];
    
    // Vérification du type de fichier
    if ($image_type !== 'image/jpeg' && $image_type !== 'image/png') {
        $default = "Le format de l'image doit être JPEG ou PNG.";
    }
    
    // Vérification de la taille de fichier
    if ($image_taille > 10000000) {
        $default = "La taille de l'image ne doit pas dépasser 1 Mo.";
    }
    
    // Upload de l'image
    $image_chemin = "assets/img/" . $image_nom;
    if (!move_uploaded_file($image_temp, $image_chemin)) {
        $default = "Une erreur est survenue lors de l'upload de l'image.";
    }
    
    // Insertion des données dans la base de données
    try {
        require "./assets/core/config.php";

        $sql = "INSERT INTO article (title, description, contenu, image, id_ut) VALUES (:title, :description, :contenu, :image, :id_ut);";
        $articleIns = $pdo->prepare($sql);
        $articleIns->bindParam(':title', $title);
        $articleIns->bindParam(':description', $description);
        $articleIns->bindParam(':contenu', $contenu);
        $articleIns->bindParam(':image', $image_chemin);
        $articleIns->bindParam(':id_ut', $_SESSION['utilisateur']['id_ut']);

        if ($articleIns->execute()) {

            header('Location: ./index.php');
            
        } else {
            $default = "Une erreur est survenue lors de l'ajout de l'article.";
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}


?>

<main class="ea-main">
    <form method="post" enctype="multipart/form-data" class="ea-container">
        <div class="ea-title">
            <div class="image-preview" id="image-preview"></div>
            <input type="file" name="image" id="image-input">
 
            <div class="input-title">
                <label for="">Titre</label>
                <input type="text" name="title" placeholder="Titre">
            </div>
        </div>
        <div class="ea-text">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="10"></textarea>
        </div>
        <div class="ea-text">
            <label for="">Recette</label>
            <textarea name="contenu" cols="30" rows="10"></textarea>
        </div>
        <button>Valider</button>
        <?php if(isset($default)) { ?>
    <div class="error-message">
        <?php echo $default; ?>
    </div>
<?php } ?>
    </form>
</main>

<script>

</script>
<?php

require "./assets/core/footer.php";

?>