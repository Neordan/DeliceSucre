<?php

require "./assets/core/header.php";
session_start();

require_once "./assets/core/config.php";
$pdo = new PDO($dsn, $dbUser, $dbPassword);

?>

<main class="pf-main">
    <form method="post" class="pf-container">
        <h2>Mon profile</h2>
        <div>
            <div class="compte">
                <div class="pf-struct">
                    <div class="col">
                        <input type="text" name="pseudo" value="<?= $_SESSION['utilisateur']['pseudo'] ?>" placeholder="Pseudo" disabled>
                        <input type="text" name="email" value="<?= $_SESSION['utilisateur']['email'] ?>" placeholder="Email" disabled>
                        <input type="text" name="ville" value="<?= $_SESSION['utilisateur']['ville'] ?>" placeholder="Ville" disabled>
                    </div>
                    <div class="col">
                        <input type="text" name="pays" value="<?= $_SESSION['utilisateur']['pays'] ?>" placeholder="Pays">
                        <input type="text" name="date_creation" value="<?= $_SESSION['utilisateur']['date_creation'] ?>" placeholder="Date de création" disabled>
                        <input type="password" name="hash-mdp" value="*" placeholder="Mot de passe" disabled>
                    </div>
                </div>
                <div class="pf-info">
                    <div class="pf-img">
                        <img src="./assets/img/logo-CCP2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="pf-btn">
            <button>Modifier</button>
        </div>
        <button><a href="./dashboard.php">dashboard</a></button>
    </form>
</main>
<?php require "./assets/core/footer.php";
?>