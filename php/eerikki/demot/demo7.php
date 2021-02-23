<h1>Demo 7</h1>
<?php
echo "Laadi for-rakenteen avulla silmukka, joka toistuu 10 kertaa ja tulostaa joka kerta kierroksen numeron.<br />";
for ($i = 0; $i < 10; $i++) {
  echo "kierros $i <br />";
}
echo "Laadi samaan tiedostoon 10 kertaa toistuva silmukka, joka laskee kierrosnumeroiden summan.<br />";

$summa = 0;
for ($i = 0; $i < 10; $i++) {
  echo "kierros $i <br />";
  $summa = $summa + $i;
}
echo "summa = " . $summa . "<br />";

// Laadi samaan tiedostoon silmukka, joka tulostaa arvot 10:stä yhteen.

echo "Laadi for-rakenteen avulla silmukka, joka tulostaa html-taulukkoon 20 x 20 kertotaulun.<br />";
// tulostetaan rivit silmukassa
echo "<table>";
for ($i = 1; $i <= 20; $i++) {
	echo "<tr>";
	// tulostetaan sarakkeet silmukassa
	for ($j = 1; $j <= 20; $j++) {
		$tulos = $i * $j;
		echo "<td>$tulos</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>
<h2>while-silmukoita</h2>
<?php
echo "<br />Laadi while-rakenteen avulla silmukka, joka toistuu 10 kertaa ja tulostaa joka kerta kierroksen numeron.<br />";

$kierros = 0;
while ($kierros < 10) {
	echo "nyt on kierros $kierros <br />";
	$kierros++;
}

echo "<br />Laadi silmukka, joka tulostaa arvot 10:stä yhteen.<br />";

echo "<br />Arvo satunnainen numero ja käy läpi silmukan avulla luvut 1:stä kymmeneen sekä kerro kuvaruudulla onko kierrosluku sama, isompi vai pienempi kuin arvottu luku.<br />";
// arvo luku 1-10
$satuluku = rand (1, 10);
echo "arvottiin $satuluku <br />";
// silmukka
$i = 1;
while ($i <= 10) {
	echo "kierros $i";
	if ($i < $satuluku) {
		echo " on pienempi<br />";
	}
	else if ($i == $satuluku) {
		echo " on sama<br />";
	}
	else {
		echo " on suurempi<br />";
	}
	$i++;
}
?>





