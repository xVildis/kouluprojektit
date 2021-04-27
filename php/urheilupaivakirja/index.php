<?php
session_start();

$request = $_SERVER['REQUEST_URI'];
$request = strpos();

switch ($request) {
    case '/' :
    case '' :
        require __DIR__ . '/views/index.php';
        break;
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;

    case "/register":
        require "views/index.php";
    break;
    
    case "/login":
        if(!islogged())
            require "views/login.php";
    break;

    case "/test":
        require "views/test.php";
    break;

    /*
    dont handle logout here
    case "logout":
        if(islogged())
            // believe there is a better way to do this
            // require "views/logout.php";
    break;
    */

    case "/create":
        if(islogged())
            require "views/createpost.php";
        else
            require "views/login.php";
    break;

    case "/delete":
        if(islogged())
            require "views/deletepost.php";
        else
            require "views/login.php";
    break;
    
    case "/edit":
        if(islogged())
            require "views/createpost.php";
        else
            require "views/login.php";
    break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

?>