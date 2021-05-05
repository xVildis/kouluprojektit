<?php
// harjoitus 11.3 - taulun hahmot
$sql = "SELECT h11_race.name AS RaceName, h11_class.name AS ClassName, h11_character.name As PlayerName, h11_character.* 
FROM `h11_character` 
inner join h11_race on h11_race.raceid=h11_character.raceID 
inner join h11_class on h11_class.classID=h11_character.classID";

// harjoitus 11.4 - hakeminen
if (isset($_POST["syote"])) {
	// jos on lähetetty hakuteksti niin lisätään
	// loppuun ehto:
	$syote = $_POST["syote"];
	$sql .= " WHERE h11_character.name LIKE '%$syote%'";
}


?>
