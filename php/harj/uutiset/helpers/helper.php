<?php

function sanit($input)
{
    $input = trim($input); //poistaa tyhjät välilyönnit alusta ja lopusta
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
}

function sanitpassword($password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    return $password;
}

function makeArticle($article)
{
    $articleId = (int)$article["articleId"];
    
    $title = sanit($article["title"]);
    $content = sanit($article["content"]);

    $beautified = "<div style='border: 1px solid black;margin-bottom: 20px; margin-top: 20px;padding-left: 10px' id='$articleId'><h2>$title</h2><div><p>$content</p>";

    if(islogged() && $article["creatorId"] === $_SESSION["id"])
    {
        
        $beautified .= "<div class='admin'>
        <a href='./?action=editarticle&articleID=$articleId'>Muokkaa</a><br>
        <a href='./?action=deletearticle&articleID=$articleId'>Poista</a><br>
        </div>";
    }

    $beautified .= "</div></div>";
    return $beautified;
}

function getSqlDate($date)
{
    switch($date)
    {
        case "2vk":
            return 60 * 60 * 24 * 7 * 2;
        break;
        case "1kk":
            return 60 * 60 * 24 * 7 * 4;
        break;
        case "3kk":
            return 60 * 60 * 24 * 7 * 4 * 3;
        break;
        case "6kk":
            return 60 * 60 * 24 * 7 * 4 * 6;
        break;
        case "1yr":
            return 60 * 60 * 24 * 7 * 4 * 12;
        break;
        default:
            return 60 * 60 * 24 * 7 * 2;
        break;
        
    }
}

?>