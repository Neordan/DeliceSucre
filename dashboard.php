<?php

require "./assets/core/header.php";

?>


<main class="dashboard">
    <div class="dashboard-container">
        <h2>Dashboard</h2>
        <div class="list-container">
            <div class="list-users">
                <div class="recherche-users">
                    <input type="text" name="" id="">
                    <label for=""><i class="fa-solid fa-magnifying-glass"></i></label>
                </div>
                <div class="list-users-table">
   <h3>Liste des utilisateurs</h3>
                </div>
            </div>
            <div class="separation">

            </div>
            <div class="list-articles">
            <div class="recherche-articles">
                    <input type="text" name="" id="">
                    <label for=""><i class="fa-solid fa-magnifying-glass"></i></label>
                </div>
                <div class="list-article-table">
                    <h3>Listes des articles</h3>
                </div>
                <button><a href="./ediart.php">Créer un nouvel article</a></button>
            </div>
        </div>
    </div>
</main>

<?php

require "./assets/core/footer.php";
