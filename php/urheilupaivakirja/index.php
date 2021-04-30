<?php
session_start();

require_once "controllers/post_controller.php";
require_once "controllers/user_controller.php";

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

    case "posts":
    case "admin":
        if(is_logged())
            require "views/posts.php";
        else
            require "views/login.php";
    break;

    case "logout":
        if(is_logged())
            logout();
        else
            require "views/index.php";
    break;

    case "delete":
        delete_controller();
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


?>