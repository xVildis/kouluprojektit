<?php
session_start();

if(isset($_GET["a"]))
    $action = $_GET["a"];
else
    $action = "index";

switch($action) {
    case "index":
        require "views/index.php";
    break;
    case "register":
        if($method === "GET")
            require "views/register.php";
        else
            register_controller();
    break;
    case "login":
        if($method === "GET")
            require "views/login.php";
        else
            login_controller();
    break;
    default:
        http_response_code(404);
        require "views/404.php";
}

?>