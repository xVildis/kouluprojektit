<?php
function indexview()
{
    $articles = getAllNews();
    echo "<div class='container'>";
    foreach($articles as $article) 
    {
        printArticle($article);
    }
    echo "</div>";
}
?>