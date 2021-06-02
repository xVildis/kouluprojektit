<?php
require_once "../partials/yhteys.php";

if(isset($_GET["id"])) {

    $sql = "SELECT * FROM h10_osallistujat WHERE tapahtumaID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_GET["id"]);
    $stmt->execute();
    $rows = $stmt->fetchAll();

    echo "<table style='width:30%' id='table'>";
    echo "<tr><th>#</th><th>Nimi</th><th>Paikkakunta</th><th>Toiminnot</th></tr>";
    foreach($rows as $row) {
        echo "<tr>";
        echo "<td>".$row["osallistujaID"]."</td>";
        echo "<td>".$row["sukunimi"].", ".$row["etunimi"]."</td>";
        echo "<td>".$row["paikkakunta"]."</td>";
        echo "<td><a href='./h10_remove.php?id=".$_GET["id"] ."&oid=". $row["osallistujaID"]."'>Poista<a/></td>";
        echo "</tr>";
    }
    echo "</table> ";

} else {
    echo "no id";
}
?>