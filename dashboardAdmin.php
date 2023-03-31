<?php
session_start();

require_once "./assets/core/header.php";

require_once "./assets/core/config.php";
require_once "./rechercheUsers.php";
require_once "./rechercheArt.php";

?>

<main class="dashboard">
    <div class="dashboard-container">
        <h2>Dashboard</h2>
        <!-- resultat des utilisateurs  -->
        <div class="list-container">
            <div class="list-users">
                <form class="recherche-users">
                    <input type="text" name="q" id="">
                    <button class="search" for=""><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="list-users-table">
                    <h3>Liste des utilisateurs</h3>
                    <div class="result-users">
                        <?php if (count($results_user) > 0) {
                            foreach ($results_user as $result) : ?>
                                <div class="list-btn-user">
                                    <p><?= $result['email'] ?></p>
                                    <div class="btn-users">
                                        <!-- changement de role  -->
                                        <form action="roleActiv.php" method="post">
                                            <select name="role">
                                                <option value="utilisateur">Utilisateur</option>
                                                <option value="editeur">Editeur</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                            <!-- Activation ou desactivation  -->
                                            <select name="activation">
                                                <option value="on">Activé</option>
                                                <option value="off">Désactivé</option>
                                            </select>
                                            <input type="hidden" name="id_ut" value="<?= $result['id_ut'] ?>">
                                            <button class="save"><i class="fa-solid fa-check"></i></button>
                                        </form>
                                        <form action="./deleteUser.php" method="post">
                                            <input type="hidden" name="id_ut" value="<?= $result['id_ut'] ?>">
                                            <button class="delete"><a href="deleteUser.php?id_ut=<?php echo $result['id_ut']; ?>">Supprimer</a></button>
                                        </form>
                                    </div>
                                </div>
                        <?php endforeach;
                        } else {
                            echo "Aucun utilisateur trouvé";
                        } ?>
                    </div>
                </div>
            </div>
            <div class="separation">
            </div>
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
