<?php
require_once "../partials/yhteys.php";

if(isset($_GET["id"])) {
    GLOBAL $pdo;

    $sql = "DELETE FROM h10_tapahtumat WHERE tapahtumaID=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_GET["id"]); 
    $ok = $stmt->execute();

    header("Location: ../?sivu=harj10&kansio=harj#table");
}
?>