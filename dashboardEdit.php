<?php

require "./assets/core/header.php";

session_start();

require_once "./assets/core/config.php";
require "./rechercheArt.php";

?>

<main class="dashboard">
    <div class="dashboard-container">
        <h2>Dashboard</h2>
        <div class="list-articles">
                <form class="recherche-articles">
                    <input type="text" name="s" id="">
                    <button class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="list-article-table">
                    <h3>Listes des articles</h3>
                    <div class="result-users">
                        <?php if (count($results_art) > 0) {
                            foreach ($results_art as $resultArt) : ?>
                                <div class="list-btn-user">
                                    <p><?= $resultArt['title'] ?></p>
                                    <form action="updateArticle.php" class="btn-users">
                                        <input type="hidden" name="id_art" value="<?= $resultArt['id_art'] ?>">
                                        <button class="delete"><a href="./updateArticle.php?id_art=<?php echo $resultArt['id_art']; ?>">Modifier</a></button>
                                    </form>
                                    <form action="deleteArticle.php" class="btn-users">
                                        <input type="hidden" name="id_art" value="<?= $resultArt['id_art'] ?>">
                                        <button class="delete"><a href="./deleteArticle.php?id_art=<?php echo $resultArt['id_art']; ?>">Supprimer</a></button>
                                    </form>
                                </div>
                        <?php endforeach;
                        } else {
                            echo "Aucun article trouvé";
                        } ?>
                    </div>
                </div>
                <button class="newArt"><a href="./editArt.php">Créer un nouvel article</a></button>
            </div>
        </div>
    </div>
</main>

<?php

require "./assets/core/footer.php";
