<?php
session_start();

require("./partials/head.php");
require("./database/models/news.php");

require("./helpers/handleaction.php");

if(isset($_GET["action"])) 
    $action = $_GET["action"];
else 
    $action = "index";

handleAction($action);

require("./partials/end.php");
?>