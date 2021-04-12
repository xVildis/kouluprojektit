<?php
require "./database/models/Player.php";

/************************************* */
$players = getAllPlayers(); //kutsuu funktiota, pitäisi saada arvokseen funktion hakemat pelaajat

echo "<pre>";
var_dump($players);
echo "</pre>";

/************************************** */

$player = getPlayerById(2);

echo "<pre>";
var_dump($player);
echo "</pre>";


/**************************************** */
$player = getPlayerByNickname("Armas");

echo "<pre>";
var_dump($player);
echo "</pre>";


/***************************************** */

$data = array("untoliini","pasusasa","eh@gmail.com","olio","2020-12-12");
$ok = addPlayer($data);
if($ok) echo "Lisätty";
else echo "Ei onnaa";

/*************************************** */

$data = array("uusinimi","uusi@gmail.com","ötökkä",1,7);

$ok = editPlayer($data);
if($ok) echo "Muutettu";
else echo "Ei onnaa";

/*************************************** */

$ok = deletePlayer(8);
if($ok) echo "Poistettu";
else echo "Ei onnaa";
?> 