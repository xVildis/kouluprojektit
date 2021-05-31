<?php
require "./partials/yhteys.php";


$sql = "SELECT * FROM h10_tapahtumat";
$tapahtumat = $pdo->query($sql)->fetchAll();

echo "<table style='width:30%'>";
foreach($tapahtumat as $tapahtuma) {
    echo "<tr>";
    echo "<td>".$tapahtuma["tapahtumaID"]."</td>";
    echo "<td><a href='./h10_edit.php'>".$tapahtuma["nimi"]."</a></td>";
    echo "<td>".$tapahtuma["paivays"]."</td>";
    echo "<td><a href='h10_delete.php?id=".$tapahtuma["tapahtumaID"]."'>Poista Tapahtuma<a/></td>";
    echo "</tr>";
}
echo "</table> ";

?>
