<h1>Demo 11</h1>
<h2>11.1 salasanan suojaus</h2>
<?php
// password_hash ja password_verify
$salasana = "salasana";
$apumuuttuja = "salainen";

$salattu = password_hash($salasana, PASSWORD_DEFAULT);
echo "salattu: " . $salattu . "<br/>";

if (password_verify("salasana", $salattu)) {
	echo "salasanat samat";
}
else {
	echo "salasanat erit";	
}
?>
<h2>11.2 filter_var</h2>
<?php
$lause = "<h1>Hei! Kuinka voit tänään?</h1>";
echo $lause;
$sanitoidutmerkit = filter_var($lause, FILTER_SANITIZE_STRING);
echo $sanitoidutmerkit;
?>
<h2>11.3 filter_var - kokonaisluku</h2>
<?php
$muuttuja = "2020-1-29";
if (filter_var($muuttuja, FILTER_VALIDATE_INT)) {
	echo "on luku";
}
else {
	echo "ei ole luku";	
}
?>
<h2>11.4 filter_var - URL</h2>
<?php
$muuttuja = "http://tredu.fi";
if (filter_var($muuttuja, FILTER_VALIDATE_URL)) {
	echo "$muuttuja on validi url";
}
else {
	echo "$muuttuja ei ole validi url";	
}
?>

<h2>11.5 filter_var - sähköposti</h2>
<?php
$muuttuja = "som/e/o()ne@example/.com";
$sanitoitu = filter_var($muuttuja, FILTER_SANITIZE_EMAIL);
if (filter_var($sanitoitu, FILTER_VALIDATE_EMAIL)) {
	echo "$sanitoitu on validi sähköposti";
}
else {
	echo "$sanitoitu ei ole validi sähköposti";	
}
?>

<h2>11.6 filter_var - kokonaisluku ja väli</h2>
<?php
$luku = -5;
if (filter_var($luku, FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>100)))) {
	echo "$luku on välillä 0-100";
}
else {
	echo "$luku ei ole välillä 0-100";
}
?>
