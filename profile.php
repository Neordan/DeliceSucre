<?php

session_start();
require "./assets/core/header.php";

require_once "./assets/core/config.php";
$pdo = new PDO($dsn, $dbUser, $dbPassword);

// Traitement du formulaire de modification
if (isset($_POST)) {
    if (isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["ville"]) && isset($_POST["pays"])) {
    $pseudo = trim($_POST['pseudo']);
    $email = trim($_POST['email']);
    $ville = trim($_POST['ville']);
    $pays = trim($_POST['pays']);

    $sql = "UPDATE utilisateur SET pseudo=:pseudo, email=:email, ville=:ville, pays=:pays WHERE id_ut=:id_ut;";

    try {
        $query = $pdo->prepare($sql);

        $query->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':ville', $ville, PDO::PARAM_STR);
        $query->bindParam(':pays', $pays, PDO::PARAM_STR);
        $query->bindParam(':id_ut', $_SESSION['utilisateur']['id_ut'], PDO::PARAM_INT);

        if ($query->execute()) {
            $_SESSION['utilisateur']['pseudo'] = $pseudo;
            $_SESSION['utilisateur']['email'] = $email;
            $_SESSION['utilisateur']['ville'] = $ville;
            $_SESSION['utilisateur']['pays'] = $pays;
            $successMessage = "Vos informations ont été mises à jour avec succès !";
        } else {
            echo "non";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        $message = "<p>Une erreur s'est produite</p>";
    }
    }
}
?>

<main class="pf-main">
    <div class="tools-profile"> 
        <?php if($_SESSION['utilisateur']['role'] == 'admin'): ?>
            <a href="./dashboardAdmin.php" class="onglet">
                <p class="logout" >Dashboard</p>
            </a>
        <?php endif; ?>
        <?php if($_SESSION['utilisateur']['role'] == 'editeur'): ?>
            <a href="./dashboardEdit.php" class="onglet">
                <p class="logout" >Dashboard</p>
            </a>
        <?php endif; ?>
        <a class="onglet">
            <button id="btnUpdate" class="logout"><p>Modifier votre profil</p></button>
        </a>
        <a href="./logout.php" class="onglet">
            <p class="logout">Déconnexion</p>
        </a>
    </div>
    <form method="post" class="pf-container">
        <h2>Mon profil</h2>
        <div>
            <div class="compte">
                <div class="pf-struct">
                    <div class="col">
                        <input type="text" name="pseudo" value="<?= $_SESSION['utilisateur']['pseudo'] ? $_SESSION['utilisateur']['pseudo'] : '' ?> " placeholder="Pseudo" id="change" disabled>
                        <input type="text" name="email" value="<?= $_SESSION['utilisateur']['email'] ? $_SESSION['utilisateur']['email'] : '' ?>" placeholder="Email" id="change" disabled>
                        <input type="text" name="ville" value="<?= $_SESSION['utilisateur']['ville'] ? $_SESSION['utilisateur']['ville'] : '' ?>" placeholder="Ville" id="change" disabled>
                    </div>
                    <div class="col">
                        <input type="text" name="pays" value="<?= $_SESSION['utilisateur']['pays'] ? $_SESSION['utilisateur']['pays'] : '' ?>" placeholder="Pays" id="change" disabled>
                        <input type="text" name="date_creation" value="<?= $_SESSION['utilisateur']['date_creation'] ?>" placeholder="Date de création" disabled>
                        <input type="password" name="hash-mdp" value="*********" placeholder="Mot de passe" disabled>
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
            <button id="btnSave">Enregistrer</button>
        </div>
    </form>
</main>

<?php require "./assets/core/footer.php";
