<html>

<?php
// 1.1 - 1.5
echo "<h1>Hello World</h1>";

echo "<p>\"Kun hyppäät ilosta ilmaan, varo, <br/> ettei kukaan vedä maata jalkojesi alta (Stanislaw Jerzy Lec)\" </p>";

$omanimi = "Viljami";
echo "Kirjoittajan nimi on " . $omanimi . "<br/>";

$luku1 = 9;
$summa = $luku1 + $luku1;
$erotus = $luku1 - $luku1;
$tulo = $luku1 * $luku1;
echo "summa = " . $summa . "<br/>";
echo "erotus = " . $erotus . "<br/>";
echo "tulo = " . $tulo . "<br/>";

define("SUOJAKERROIN_25", 25);
define("SUOJAKERROIN_50", 50);


?>

</html>