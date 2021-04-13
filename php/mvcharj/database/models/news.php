<?php
/*  
    CREATE TABLE IF NOT EXISTS `players` (
      `playerID` int(10) NOT NULL AUTO_INCREMENT,
      `nickname` varchar(15) NOT NULL,
      `password` varchar(255) NOT NULL,
      `email` varchar(50) NOT NULL,
      `current_character` varchar(15) NOT NULL,
      `money` decimal(10,0) NOT NULL DEFAULT '500',
      `lastLogin` date NOT NULL,
      `banned` tinyint(1) NOT NULL DEFAULT '0',
      `teamID` int(10) DEFAULT NULL,
      PRIMARY KEY (`playerID`),
      KEY `teamID` (`teamID`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
*/

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


function getUserByNickname($nickname)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_articles WHERE username = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $nickname);
    $stm->execute();
    
    $user = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

?>