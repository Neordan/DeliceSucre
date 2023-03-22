<?php

function recupAll($table, $connect)
{
    $sql = "SELECT * FROM $table";
    $resultat = $connect->prepare($sql);
    $resultat->execute();

    return $resultat;
}

function recupArticleInfo($table, $connect, $champ, $key)
{
    $sql = "SELECT * FROM $table WHERE $champ=$key";
    $resultat = $connect->prepare($sql);

    $resultat->execute();

    return $resultat;
}
