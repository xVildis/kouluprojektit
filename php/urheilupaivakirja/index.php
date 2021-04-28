<?php
session_start();

if(isset($_GET["a"])) {
    $action = $_GET["a"];
} else {
    $action = "index";
}

$method = strtolower($_SERVER["REQUEST_METHOD"]);

switch($action) {

    case "index":
        require "views/index.php"; 
    break;

    case "register":
        if($method=="get")
            require "./views/register.php";
        else 
            register_controller();
    break;

    case "login":
        if($method =="get")
            require "./views/login.php";
        else 
            login_controller();
    break;

    case "admin":
        if(is_logged())
            require "views/posts.php";
        else
            require "views/login.php";
    break;

    case "logout":
        if(is_logged())
            logout_controller();
        else
            require "views/index.php";
    break;

    case "delete":
        
    break;

    case "edit":
        if(is_logged())
            edit_controller();
        else
            require "views/login.php";
    break;

    default:
        http_response_code(404);
        echo "404";
} 



/* idk how to use a router yet
$request = $_SERVER['REQUEST_URI'];
$request = '/test';

switch ($request) {
    case '/' :
    case '' :
        require __DIR__ . '/views/index.php';
    break;
    
    case '/about' :
        require __DIR__ . '/views/about.php';
    break;

    case "/register":
        if(!is_logged())
            require "views/register.php";
        else
            // send to own posts
    break;
    
    case "/login":
        if(!is_logged())
            require "views/login.php";
        else
            // send to own posts
    break;

    case "/test":
        require "views/test.php";
    break;

    case "/create":
        if(is_logged())
            require "views/createpost.php";
        else
            require "views/login.php";
    break;

    case "/delete":
        if(is_logged())
            require "views/deletepost.php";
        else
            require "views/login.php";
    break;
    
    case "/edit":
        if(is_logged())
            require "views/createpost.php";
        else
            require "views/login.php";
    break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}

*/
?>