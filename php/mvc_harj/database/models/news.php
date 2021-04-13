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
require "./helpers/helper.php";

function getAllNews()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM mvc2_articles";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $players = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $players;

}

function getArticleById($id)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_articles WHERE articleId = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();

    $player = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $player;
}


function getUserByNickname($nickname)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_articles WHERE username = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $nickname);
    $stm->execute();
    
    $player = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $player;
}

function printArticle($article)
{
    $id = $article["articleId"];

    $title = sanit($article["title"]);
    $content = sanit($article["content"]);
    
    $beautified = "<div style='border: 1px solid black; margin-bottom: 20px; margin-top: 20px' id='$id'>
                    <h2>$title</h2>
                    <p>$content</p>
                   </div>";

    echo $beautified;
}

?>