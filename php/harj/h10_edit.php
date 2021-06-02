<?php
if(isset($_GET["id"])) {
    $sql = "SELECT * FROM h10_osallistujat WHERE tapahtumaID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_GET["id"]);
    $rows = $stmt->fetchAll();

    foreach($rows as $row) {

    }

} else {
    
}
?>