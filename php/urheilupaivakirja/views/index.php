<?php
require_once "helpers/auth.php";
require_once "partials/head.php";

if(is_logged())
    require_once "views/posts.php";
else
    require_once "views/about.php";


require_once "partials/end.php";
?>
