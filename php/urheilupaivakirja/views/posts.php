<?php
$sitename = "posts";
require_once "partials/head.php";

// beautify in get_posts or here?
// probably here, otherwise this file would be useless
$posts = get_posts();
foreach($posts as $post) {
    
}

?>