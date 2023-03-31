<?php

require "./assets/core/header.php";

if (isset($_POST['submit'])) {

    if (isset($_POST["email"]) && isset($_POST["hash_mpd1"]) && isset($_POST["hash_mpd2"]) && isset($_POST["pseudo"])) {
        // Les deux mots de passes sont identiques ?
        if ($_POST["hash_mpd1"] == $_POST["hash_mpd2"]) {
            
            $email = $_POST["email"];
            $pseudo = $_POST["pseudo"];
            $activation = 1;

             // Vérification du mot de passe
             if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["hash_mpd1"]) || strlen($_POST["hash_mpd1"]) < 6) {
                echo "<p>Mot de passe invalide : doit contenir au moins 6 caractères et/ou pas de caractères spéciaux.</p>";
            }
            

            // le mot de passe de confirmation
            $hash_mpd = $_POST["hash_mpd1"];
            // A remplacer pour hasher le mot de passe par:
            $options = [
                'cost' => 12,
            ];
            $hash_mpd = password_hash($_POST["hash_mpd1"], PASSWORD_BCRYPT, $options);

            // Traitement des données facultatives du formulaire

            $ville = isset($_POST["ville"]) ? $_POST["ville"] : "";

            $pays = isset($_POST["pays"]) ? $_POST["pays"] : "";



            // Requête SQL
            $sql = "INSERT INTO utilisateur (email, hash_mdp, pseudo, ville, pays, activation) VALUES (:email, :hash_mpd, :pseudo, :ville, :pays, :activation);";
            
            // Connexion à la base de données
            require "./assets/core/config.php";
            
            // Préparer la requête
            
            $register = $pdo->prepare($sql);
            // Liaison des paramètres de la requête préparée
            $register->bindParam(":email", $email, PDO::PARAM_STR);
            $register->bindParam(":hash_mpd", $hash_mpd, PDO::PARAM_STR);
            $register->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
            $register->bindParam(":activation", $activation, PDO::PARAM_INT);
            $register->bindParam(":ville", $ville, PDO::PARAM_STR);
            $register->bindParam(":pays", $pays, PDO::PARAM_STR);

            

            // Exécution de la requête
            if ($register->execute()) {
                echo "<p>Ton compte a bien été créé !</p>";
                header("location: login.php");
                exit();
            } else {
                echo "<p>Une erreur s'est produite</p>";
            }
        } else {
            // Les deux mots de passes saisis sont différents
            echo "<p>mots de passe différents</p>";
        }
    } else {
        echo "Champs obligatoires absents";
    }
}
?>

<main class="register">
    <div class="container-reg">
        <h2>Crée ton compte</h2>
        <form method="post">
            <input type="text" name="pseudo" placeholder="pseudo">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="hash_mpd1" placeholder="mot de passe">
            <input type="password" name="hash_mpd2" placeholder="vérifier le mot de passe">
            <input type="hidden" name="activation" value="1">
            <input type="text" name="ville" placeholder="ville">
            <input type="text" name="pays" placeholder="pays">

            <button name="submit">Valider</button>
        </form>
    </div>
</main>

<?php

require "./assets/core/footer.php";

?>