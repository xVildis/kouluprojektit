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
    $title = sanit($article["title"]);
    $content = sanit($article["content"]);

    $beautified = "<div style='border: 1px solid black;'><h2>$title</h2><div><p>$content</p></div></div>";

    return $beautified;
}

?>