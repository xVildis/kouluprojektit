<?php

require "./database/connection.php";

function getAllNews()
{
    global $pdo;
    $sql = "SELECT * FROM mvc2_articles WHERE deletiondate > NOW()";
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

    $article = $stm->fetch(PDO::FETCH_ASSOC);
    return $article;
}

function createArticle($title, $content, $deletionDate)
{

    global $pdo;

    $sql = "INSERT INTO mvc2_articles (title, content, creationDate, deletionDate, creatorId) VALUES (?,?,?,?,?)";
    $stm = $pdo->prepare($sql);

    $currentDate = date('Y-m-d H:m:s');
    $deletionDate = date('Y-m-d H:m:s', $deletionDate);
    $data = array($title, $content, $currentDate, $deletionDate, $_SESSION["id"]);

    if($stm->execute($data))
        require "./views/index-view.php";

}

function deleteArticle($articleId)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_articles WHERE articleId = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $articleId);
    $stm->execute();

    $article = $stm->fetch(PDO::FETCH_ASSOC);
    if(!$article)
    {
        $message = "<p style='color: red;'>artikkelia ei löytynyt</p>";
        require "./views/index-view.php";
        return;
    }

    if($article["creatorId"] === $_SESSION["id"])
    {
        $sql2 = "DELETE FROM `mvc2_articles` WHERE `articleId` = ?";
        $stm2 = $pdo->prepare($sql2);
        $stm2->bindValue(1, $articleId);
        $stm2->execute();

        $message = "<p>Poistettu</p>";
        require "./views/index-view.php";
    } else {
        echo "403";
    }

}

?>