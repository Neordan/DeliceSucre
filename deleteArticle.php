<?php

$id_art = $_GET['id_art'];

    require "./assets/core/config.php";
    $sql = "DELETE FROM article WHERE id_art=$id_art;";
    $query = $pdo->prepare($sql);
    if ($query->execute()) {
        header('Location: ./dashboard_edit.php');
    }