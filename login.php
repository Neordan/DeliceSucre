<?php 
require "./assets/core/header.php";
session_start();

// traitement du formulaire de connexion
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
                if(!empty($results)) {
                    if(password_verify($hash_mdp, $results['hash_mdp'])) {
                        $_SESSION['utilisateur'] = $results;
                        header('Location: profile.php');

                    }
                }
            } catch(PDOException $e) {
                echo $e-> getMessage();
                $message = "<p>Une erreur s'est produite</p>";
            }
            var_dump($results);
}
?>

<main class="login">
    <div class="container-log">
        <h2>Se connecter</h2>

        <form method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="hash_mdp" placeholder="Mot de passe">
            <div class="captcha">
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
