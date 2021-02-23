<?php
date_default_timezone_set("Europe/Helsinki");
// jos ei niin näkyy tunti eroa
echo date("d.m.Y");
echo "<br />";
echo date("H:i:s");

// päivämäärän tekeminen itse:
$paiva =24;
$kk = 12;
$vuosi = 2021;
$tunnit = 18;
$min = 30;
$s = 0;
// mktimen avulla rakennetaan:
echo "<h2>mktime</h2>";
$aika = mktime($tunnit, $min, $s, $kk, $paiva, $vuosi);
echo "mktime: " . $aika;
echo "<br / >";
echo date('d.m.Y H:i:s', $aika);

echo "<h2>funktiot</h2>";

//echo palautaPvm();
//echo laskeLoppumisPvm();
//  palauttaa tämän päivän tietokantojen hyväksymässä muodossa
function palautaPvm() {
	// 2021-1-22
	$nyt = date("Y-m-d");
	return $nyt;
}

function laskeLoppumisPvm() {
	// aika nyt
	$nyt = date("Y-m-d");
	// aika sitten
	$sitten = date("Y-m-d", strtotime("$nyt + 7 days"));
	return $sitten;
}

$ero = laske_kesto("2021-1-7","2021-6-4");
echo $ero->format("Eroa on %a päivää");

function laske_kesto($aika1, $aika2) {
	// date_create
	$alku = date_create($aika1);
	$loppu = date_create($aika2);
	$ero = date_diff($alku, $loppu);
	return $ero;
}





?>





