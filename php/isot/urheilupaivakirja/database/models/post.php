<?php
require_once "database/db.php";

function get_posts() {
    GLOBAL $con;

    $userId = $_SESSION["id"];
    $query = "SELECT * FROM urheilu_posts WHERE userId = $userId";

    $result = $con->query($query);
    
    return $result;
}

function create_post() {
    GLOBAL $con;

    $userId = $_SESSION["id"];
    $query = "INSERT INTO urheilu_posts(creatorId, sport, intensity, kcal, quantity, date, description) VALUES (?,?,?,?,?,?,?)";

    $stmt = $con->prepare($query);
    $stmt->bind_param('iiiiiss', $userId, $sport, $intensity, $kcal, $quantity, $date, $description);
    
    $stmt->execute();
    
    return $stmt;
}

?>