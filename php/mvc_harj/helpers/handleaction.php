<?php
require("./views/adminview.php");
require("./views/indexview.php");
require("./views/loginview.php");
require("./views/logoutview.php");
require("./views/registerview.php");

function handleaction($action) {

    // difference with post and get
    $rqmethod = strtolower($_SERVER["REQUEST_METHOD"]);

    switch($action) {
        case "index":
            indexview();
        break;

        case "register":
            registerview($rqmethod);
        break;

        case "login":
            loginview($rqmethod);
        break;

        case "logout":
            if(islogged())  {
                session_unset(); //poistaa istuntomuuttujat
                session_destroy();//poistaa koko istunnon
            }
        break;  

        case "admin":
            adminview($rqmethod);
        break;

        default:
            header("Location: ./404.php");

    }
}
?>