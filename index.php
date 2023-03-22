    <?php
    require "./assets/core/header.php";

    $sql = "SELECT * FROM article ORDER BY date_creation DESC";
    require "./assets/core/config.php";
    $articles = $pdo->prepare($sql);
    $articles->execute();

    ?>

    <main class="index">
            <section class="section-1">
            <form method="GET" class="sb">
                <input type="text" name="q" placeholder="Rechercher ..." class="nav-sb" autocomplete="off">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="sectionresult">
                <?php if (count($results) > 0) {
                    foreach ($results as $result) {
                        echo '<a href="articlePage.php?id_art=' . $result['id_art'] . '">' . $result['title'] . '</a><br>';
                    }
                } else {
                    echo "";
                } ?>
            </div>
            <h2>Les recettes</h2>
            <div class="art-scroll">
                <?php
                // Vérifier s'il y a des résultats
                if ($articles->rowCount() > 0) {
                    // Afficher tous les articles
                    foreach ($articles as $article) : ?>
                        <a href="articlePage.php?id_art=<?= $article['id_art']; ?>">
                            <div class="articles">
                                <img src="<?= $article['image']; ?>" alt="">
                                <div class="right">
                                    <div class="titre"><?= $article['title'] ?></div>
                                    <p class="description"><?= $article['contenu'] ?></p>
                                </div>
                            </div>
                        </a>
                <?php endforeach;
                } else {
                    echo "Aucun article trouvé.";
                }


                ?>
        </section>
        <section class="section-2">
            <h2>Petits délices</h2>
            <div class="petit-delices">
                <img src="./assets/img/crepe.jpg" alt="">
                <h4>
                    Les crêpes
                </h4>
            </div>
            <div class="petit-delices">
                <img src="./assets/img/gaufre.jpg" alt="">
                <h4>
                    Les gaufres
                </h4>
            </div>
            <div class="petit-delices">
                <img src="./assets/img/pancake.jpg" alt="">
                <h4>
                    Les pancakes
                </h4>
            </div>
        </section>
        </div>
        </main>
        <?php
        require "./assets/core/footer.php";
        ?>