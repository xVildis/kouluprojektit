<?php

require("./database/connection.php");

function get_all_news()
{
    global $pdo;

    $sql = "SELECT * FROM news";
    $stm = $pdo->query($sql);

    $news = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $news;

}

?>

