<?php
require "./assets/core/header.php";
require "./assets/core/config.php";

$id_art = $_GET['id_art'] ?? null;

// Vérifier si l'id est valide
if (!is_numeric($id_art)) {
    header('Location: ./index.php');
    exit;
}

// Récupérer les données de l'article
$sql = "SELECT * FROM article WHERE id_art = :id_art LIMIT 1;";
$query = $pdo->prepare($sql);
$query->bindParam(':id_art', $id_art, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

// Vérifier si l'article existe
if (!$result) {
    header('Location: ./index.php');
    exit;
}

$title = htmlspecialchars($result['title']);
$description = htmlspecialchars($result['description']);
$contenu = htmlspecialchars($result['contenu']);
$image = htmlspecialchars($result['image']);

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données du formulaire
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $contenu = htmlspecialchars(trim($_POST['contenu']));

    // Vérification et traitement de l'image
    $image_chemin = $image;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_nom = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $image_taille = $_FILES['image']['size'];
        $image_temp = $_FILES['image']['tmp_name'];

        // Vérification du type de fichier
        if (!in_array($image_type, ['image/jpeg', 'image/png'])) {
            $default = "Le format de l'image doit être JPEG ou PNG.";
        }

        // Vérification de la taille de fichier
        if ($image_taille > 10000000) {
            $default = "La taille de l'image ne doit pas dépasser 10 Mo.";
        }

        // Upload de l'image
        $image_chemin = "assets/img/" . $image_nom;
        if (!move_uploaded_file($image_temp, $image_chemin)) {
            $default = "Une erreur est survenue lors de l'upload de l'image.";
        }
    }

    // Mettre à jour l'article dans la base de données
    $sql = "UPDATE article SET title=:title, description=:description, contenu=:contenu, image=:image WHERE id_art=:id_art;";
    $updateArticle = $pdo->prepare($sql);
    $updateArticle->bindParam(':title', $title);
    $updateArticle->bindParam(':description', $description);
    $updateArticle->bindParam(':contenu', $contenu);
    $updateArticle->bindParam(':image', $image_chemin);
    $updateArticle->bindParam(':id_art', $id_art);

    if ($updateArticle->execute()) {
        header('Location: ./index.php');
        exit;
    } else {
        $default = "Une erreur est survenue lors de la mise à jour.";
    }
}
?>

<main class="ea-main">
    <form method="post" enctype="multipart/form-data" class="ea-container">
        <div class="ea-title">
            <div class="image-preview" id="image-preview">
                <?php if ($image) : ?>
                    <img src="<?= $image ?>" alt="Image d'illustration">
                <?php endif; ?>
                <div class="ea-image">
                    <label for="image">Image</label>
                    <input type="file" name="image" accept="image/jpeg, image/png">
                </div>
            </div>
            <div class="input-title">
                <label for="titre">Titre</label>
                <input type="text" name="title" placeholder="Titre" value="<?= $title ?>">
            </div>
        </div>
        <div class="ea-text">
            <label for="description">Description</label>
            <textarea name="description" cols="30" rows="10"><?= $description ?></textarea>
        </div>
        <div class="ea-text">
            <label for="contenu">Recette</label>
            <textarea name="contenu" cols="30" rows="10"><?= $contenu ?></textarea>
        </div>
        <button>Valider</button>
    </form>
</main>