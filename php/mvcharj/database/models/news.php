<?php

require "./database/connection.php";

function getAllNews()
{
    global $pdo;
    $sql = "SELECT * FROM mvc2_articles";
    $stm = $pdo->query($sql);

    $articles = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $articles;

}

function getArticleById($id)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_articles WHERE articleId = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();

    $article = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $article;
}


?>