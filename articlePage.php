<?php

require "./assets/core/header.php";

require "./assets/core/config.php";
require "./functions.php";

$id_art = $_GET['id_art'];

// recuperer la publication
$sql = "SELECT title, contenu, image FROM article WHERE id_art=$id_art";
require "./assets/core/config.php";
$query = $pdo->prepare($sql);
$query->execute();
?>


<main class="article-page">
    <?php foreach ($query as $row) : ?>
        <div class="section-left">
            <div class="entete-article">
                <img src="<?= $row['image']; ?>" alt="">
                <div class="title-container">
                    <div class="title-article">
                        <p><?= $row['title']; ?></p>
                    </div>
                </div>
            </div>
            <div class="description-article">
                <p><?= $row['contenu']; ?></p>
            </div>
        </div>
    <?php endforeach ?>
    <div class="section-right">
        <h2>Commentaires</h2>
        <form method="post" class="commentaire commentaireForm">
            <p>Ajouter un commentaire</p>
            <input type="text" name="message" autocomplete="off">
            <button>Envoyer</button>
        </form>
        <div class="commentaire">
            <h3>Auteur</h3>
            <div class="desc-com">
                findofnvfd
            </div>
        </div>
        <div class="commentaire">
            <h3>Auteur</h3>
            <div class="desc-com">
                findofnvfd
            </div>
        </div>
        <div class="commentaire">
            <h3>Auteur</h3>
            <div class="desc-com">
                findofnvfd
            </div>
        </div>
    </div>
</main>

<?php

require "./assets/core/footer.php";
