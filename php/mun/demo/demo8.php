<?php
/*Laadi for-silmukkaa käyttäen 10 alkion taulukko $numerot, jossa kaikkien alkioiden arvo on aluksi 0.*/
for ($i = 0; $i < 10; $i++) {
	$numerot[$i] = 0;
}

/* Tee seuraavien indeksin ja arvojen muutokset:

indeksiin 0 arvo 5
indeksiin 2 arvo 3
indeksiin 3 arvo 9
indeksiin 1 arvo 2
indeksiin 9 arvo 4 */
$numerot[0] = 5;
$numerot[2] = 3;
$numerot[3] = 9;
$numerot[1] = 2;
$numerot[9] = 4;

// tulostetaan taulukko näkyviin
for ($i = 0; $i < 10; $i++) {
	echo $i . " - " . $numerot[$i] . "<br/>";
}

print_r($numerot);
var_dump($numerot);

echo "<h4>foreatch-tulostus</h4>";
$summa = 0;
foreach ($numerot as $numero) {
	echo "$numero<br/>";
	$summa += $numero;
}
echo "summa = " . $summa . "<br/>";
?>
<h2>8.2 assosiatiivinen taulukko</h2>
<?php
$koulu = array("nimi"=>"Tredu", "osoite"=>"Hepolamminkatu 10", "postinro"=>"33720", "postitp"=>"TAMPERE", "maa"=>"Suomi");

foreach($koulu as $avain=>$arvo) {
    echo "$avain on $arvo<br>";
} 

echo "<h4>print_r</h4>";
print_r($koulu);
echo "<h4>var_dump</h4>";
var_dump($koulu);
?>









