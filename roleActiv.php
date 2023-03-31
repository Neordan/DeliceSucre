<?php

session_start();

$id_ut = $_POST['id_ut'];

// Rôle utilisateur //

if(isset($_POST['role']) && $_POST['role'] == "admin") {
    require_once "./assets/core/config.php";
    $sql = "UPDATE utilisateur SET role = 'admin' WHERE id_ut = $id_ut;";
    $query = $pdo-> prepare($sql);
    if($query-> execute()) {
        header('Location: dashboard_admin.php');
    }
} else {
    echo "<p>Une erreur est survenue !</p>";
}

if(isset($_POST['role']) && $_POST['role'] == "editeur") {
    require_once "./assets/core/config.php";
    $sql = "UPDATE utilisateur SET role = 'editeur' WHERE id_ut = $id_ut;";
    $query = $pdo-> prepare($sql);
    if($query-> execute()) {
        header('Location: dashboard_admin.php');
    }
} else {
    echo "<p>Une erreur est survenue !</p>";
}
    
if(isset($_POST['role']) && $_POST['role'] == "utilisateur") {
    require_once "./assets/core/config.php";
    $sql = "UPDATE utilisateur SET role = 'utilisateur' WHERE id_ut = $id_ut;";
    $query = $pdo-> prepare($sql);
    if($query-> execute()) {
        header('Location: dashboard_admin.php');
    }
} else {
    echo "<p>Une erreur est survenue !</p>";
}

// Activer / Désactiver //

if(isset($_POST['activation']) && $_POST['activation'] == 'off') {
    require_once "./assets/core/config.php";
    $sql = "UPDATE utilisateur SET activation = 'off' WHERE id_ut = $id_ut;";
    $query = $pdo-> prepare($sql);
    if($query-> execute()) {
        header('Location: dashboard_admin.php');
    }
} else {
    echo "<p>Une erreur est survenue !</p>";
}
    
if(isset($_POST['activation']) && $_POST['activation'] == 'on') {
    require_once "./assets/core/config.php";
    $sql = "UPDATE utilisateur SET activation = 'on' WHERE id_ut = $id_ut;";
    $query = $pdo-> prepare($sql);
    if($query-> execute()) {
        header('Location: dashboard_admin.php');
    }
} else {
    echo "<p>Une erreur est survenue !</p>";
}
