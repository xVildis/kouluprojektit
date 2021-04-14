<?php

require "./database/connection.php";

function getAllNews()
{
    global $pdo;
    $sql = "SELECT * FROM mvc2_articles WHERE deletiondate > CURRENT_DATE";
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

function createArticle($title, $content, $deletionDate)
{
    global $pdo;

    $sql = "INSERT INTO mvc2_articles (title, content, creationDate, deletionDate) VALUES (?,?,?,?)";
    $stm = $pdo->prepare($sql);

    $currentDate = date('Y-m-d H:m:s');
    
    $data = array($title, $content, $currentDate, $deletionDate);

    $stm->execute($data);
}


?>