<?php
session_start();

require("./partials/head.php");
require("./database/models/news.php");

require("./views/*.php");

if(isset($_GET["action"])) 
    $action = $_GET["action"];
else 
    $action = "index";

// difference with post and get
$rqmethod = strtolower($_SERVER["REQUEST_METHOD"]);

switch($action) {
    case "index":
        indexview();
    break;

    case "register":
        registerview();
    break;

    case "login":
        loginview();
    break;

    case "logout":
        logoutview();
    break;  

    case "admin":
        adminview();
    break;
    
    default:
        header("Location: ./404.php");
    
}

$articles = getAllNews();
foreach($articles as $article) 
{
    printArticle($article);
}


require("./partials/end.php");
?>