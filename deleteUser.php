<?php

$id_ut = $_GET['id_ut'];

    require "./assets/core/config.php";
    $sql = "DELETE FROM utilisateur WHERE id_ut=$id_ut;";
    $query = $pdo->prepare($sql);
    if ($query->execute()) {
        header('Location: ./dashboard_admin.php');
    }