<?php 
require "./assets/core/header.php";
session_start();

// génération d'un code aléatoire de 6 caractères pour le captcha
$captcha_code = substr(md5(mt_rand()), 0, 6);

// stockage du code captcha dans une variable de session
$_SESSION["captcha_code"] = $captcha_code;

// traitement du formulaire de connexion
if (isset($_POST["email"]) && isset($_POST["hash_mdp"]) && isset($_POST["captcha"])) {
    $email = trim($_POST['email']);
    $hash_mdp = trim($_POST['hash_mdp']);
    $captcha = $_POST["captcha"];

    // vérification du code captcha
    if ($captcha == $_SESSION["captcha_code"]) {
        $sql = "SELECT * FROM utilisateur WHERE email LIKE '$email';";

        try {
            require_once "./assets/core/config.php";

            $pdo = new PDO($dsn, $dbUser, $dbPassword);

            $query = $pdo-> prepare($sql);

            if($query-> execute()) {
                $results = $query-> fetch();
            }
                if(!empty($results)) {
                    if(password_verify($hash_mdp, $results['hash_mdp'])) {
                        $_SESSION['utilisateur'] = $results;
                        header('Location: profile.php');
                        // var_dump($_SESSION['utilisateur']['pseudo']);
                    }
                }
            } catch(PDOException $e) {
                echo $e-> getMessage();
                $message = "<p>Une erreur s'est produite</p>";
            }
    } else {
        // le code captcha est invalide, afficher un message d'erreur
        $message = "<p>Le code captcha est invalide</p>";
    }
}
?>

<main class="login">
    <div class="container-log">
        <h2>Se connecter</h2>
        <?php
        if (isset($message)) {
            echo '<div class="error">' . $message . '</div>';
        }
        ?>
        <form method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="hash_mdp" placeholder="Mot de passe">
            <div class="captcha">
                <img src="./captcha_image.php" alt="captcha">
                <input type="text" name="captcha" placeholder="Entrez le code ici">
            </div>
            <button>Connexion</button>
        </form>
        <div class="inscription">
            <a href="./register.php">S'incrire</a>
            <a href="">Mot de passe oublié ?</a>
        </div>
    </div>
</main>

<?php
require "./assets/core/footer.php";
?>
