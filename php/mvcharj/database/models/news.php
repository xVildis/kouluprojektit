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


function getUserByUsername($username)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_users WHERE username = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $username);
    $stm->execute();
    
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    return $user;
}

?>