<?php
session_start(); 

if(isset($_GET["action"])) $action = $_GET["action"];
else $action = "index";

$method = strtolower($_SERVER["REQUEST_METHOD"]);

require "./controllers/controller.php";
require "./helpers/auth.php";

switch($action) {

    case "index":
        indexcontroller(); 
    break;

    case "register":
        if($method=="get")
            require "./views/registerform-view.php";
        else 
            postregistercontroller();
    break;

    case "login":
        if($method =="get")
        {
            //echo "getlogin";
            require "./views/loginform-view.php";
        }
        else {
            //echo "postlogin";
            postlogincontroller();
        }
    break;
    
    case "createarticle":
        if(islogged())
        {
            if($method =="get")
                require "./views/article-view.php";
            else 
                articlecontroller();
        } else {
            require "./views/loginform-view.php";
        }
    break;

    case "editarticle":
        if(islogged())
        {
            if($method=="get")
                require "./views/edit-view.php";
            else 
                editcontroller();
        } else {
            require "./views/loginform-view.php";
        }
    break;

    case "deletearticle":
        if(islogged() && isset($_GET["articleID"]))
        {
            deleteArticle($_GET["articleID"]);
        } else {
            indexcontroller();
        }
    break;

    case "admin":
        if($method=="get")
            require "./views/article-view.php";
        else 
            articlecontroller();
    break;

    case "logout":
        if(islogged()) {
            logoutcontroller();
        } else indexcontroller();
    break;

    default:
        echo "404";
} 

?>