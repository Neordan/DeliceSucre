<?php
session_start();
require "./assets/core/header.php";

// Si l'utilisateur est déjà connecté, rediriger vers le profil
if(isset($_SESSION['utilisateur'])) {
    header('Location: profile.php');
    exit();
}

// Traitement du formulaire de connexion
if (isset($_POST["email"]) && isset($_POST["hash_mdp"])) {
    $email = trim($_POST['email']);
    $hash_mdp = trim($_POST['hash_mdp']);

    $sql = "SELECT * FROM utilisateur WHERE email LIKE '$email';";

    try {
        require_once "./assets/core/config.php";

        $pdo = new PDO($dsn, $dbUser, $dbPassword);

        $query = $pdo-> prepare($sql);

        if($query-> execute()) {
            $results = $query-> fetch();
        }

        if(empty($results)) {
            echo "Adresse e-mail inconnue.";
        } else {
            if(password_verify($hash_mdp, $results['hash_mdp'])) {
                $_SESSION['utilisateur'] = $results;
                if($_SESSION['utilisateur']['activation'] == 'on') {
                    header('Location: profile.php');
                }
            } else {
                echo "Mot de passe incorrect.";
            }
            if(password_verify($hash_mdp, $results['hash_mdp'])) {
                $_SESSION['utilisateur'] = $results;
                if($_SESSION['utilisateur']['activation'] == 'off') {
                    header('Location: errorPage.php');
                }
            } else {
                echo "Mot de passe incorrect.";
            }
        }
    } catch(PDOException $e) {
        echo $e-> getMessage();
        $message = "<p>Une erreur s'est produite</p>";
    }
}
?>
<main class="login">
    <div class="container-log">
        <h2>Se connecter</h2>

        <form method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="hash_mdp" placeholder="Mot de passe">
            <div class="g-recaptcha" data-sitekey="6Ldf-iklAAAAACFoyh3f_ykPv6FLHlLQpWzJoNt5"></div>
            <button>Connexion</button>
        </form>
        <div class="inscription">
            <a href="./register.php">S'inscrire</a>
            <a href="">Mot de passe oublié ?</a>
        </div>
    </div>
</main>

<?php
require "./assets/core/footer.php";
?>
