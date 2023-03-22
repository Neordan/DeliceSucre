<?php
require_once 'assets/core/config.php';

$results = array();
if(isset($_GET['q']) && $_GET['q'] !== '') {
  $search = htmlspecialchars(trim(($_GET['q'])));
  $sql = "SELECT * FROM article WHERE title LIKE :search ORDER BY date_creation DESC";
  $query = $pdo->prepare($sql);
  $query->execute([
    'search' => '%'.$search.'%'
  ]);
  
  $results = $query->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Délice Sucré</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <div class="header-container">
            <a href="../../index.php"><img src="assets/img/logo-CCP2.png" alt="Logo"></a>
            <h1>Délice Sucré</h1>
            <a href="../../login.php" class="h-btn">
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="#">Pâtisserie</a></li>
                <li><a href="#">Viennoiserie</a></li>
                <li><a href="#">Confiseries</a></li>
                <li><a href="#">Biscuits</a></li>
            </ul>
            </div>
        </nav>
    </header>