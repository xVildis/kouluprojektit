<?php
require_once "database/db.php";

function get_posts() {
    GLOBAL $con;

    $userId = $_SESSION["id"];
    $query = "SELECT * FROM urheilu_posts WHERE userId = $userId";
    $result = $con->query($query);
    return $result;
}

?>