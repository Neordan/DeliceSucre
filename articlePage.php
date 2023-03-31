<?php

require "./assets/core/header.php";
session_start();
require "./assets/core/config.php";

//récupération de l'id de l'article
$id_art = $_GET['id_art'];

// recuperer la publication de la base de donnée
$sql = "SELECT title, contenu, image FROM article WHERE id_art=$id_art";
require "./assets/core/config.php";
$query = $pdo->prepare($sql);
$query->execute();

// recuperer les commentaires avec l'auteur le message et la date de création de l'article de la base de donnée
$sql2 = "SELECT u.pseudo, c.message, c.date_creation 
FROM utilisateur u 
JOIN commentaire c ON u.id_ut = c.id_ut 
WHERE c.id_art = $id_art
ORDER BY c.date_creation DESC";

require "./assets/core/config.php";
$coms = $pdo->prepare($sql2);
$coms->execute();
$comments = $coms->fetchAll(PDO::FETCH_ASSOC);


?>
<main class="article-page">
    <!-- boucle pour afficher chaque ligne  -->
    <?php foreach ($query as $row) : ?>
        <div class="section-left">
            <div class="entete-article">
                <!-- Afficher l'image de l'article  -->
                <img src="<?= $row['image']; ?>" alt="">
                <div class="title-container">
                    <div class="title-article">
                        <!-- Afficher le titre de l'article  -->
                        <p><?= $row['title']; ?></p>
                    </div>
                </div>
            </div>
            <div class="description-article">
                <!-- Afficher le contenu de l'article  -->
                <p><?= nl2br($row['contenu'], true) ?></p>
            </div>
        </div>
    <?php endforeach ?>
    <div class="section-right">
        <h2>Commentaires</h2>
        <form method="post" action="./ajoutcom.php" class="commentaire">
            <p>Ajouter un commentaire</p>
            <textarea name="message" id="" cols="30" rows="10"></textarea>
            <input type="hidden" name="id_art" value="<?= $id_art ?>">

            <button>Envoyer</button>
        </form>
        <div class="commentaires">
            <?php
            if (empty($comments)) {
                echo "Aucun commentaire";
            } else {
                foreach ($comments as $com) : ?>
                    <div class="commentaire">
                        <h4><?= htmlspecialchars($com['pseudo']) ?></h4>
                        <p><?= htmlspecialchars($com['message']) ?></p>
                        <p><?= htmlspecialchars($com['date_creation']) ?></p>
                    </div>
            <?php endforeach;
            } ?>
        </div>
    </div>
</main>

<?php

require "./assets/core/footer.php";
?>