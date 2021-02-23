<h2>Tehtävä 2</h2>
<?php
require "../demot/yhteys.php";
$sql = "SELECT h11_race.name AS RaceName, h11_class.name AS ClassName, h11_character.name As PlayerName, h11_character.* FROM `h11_character` inner join h11_race on h11_race.raceid=h11_character.raceID inner join h11_class on h11_class.classID=h11_character.classID ";

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

// luodaan tiedosto
$myfile = fopen("characters.xml", "w") or die("Unable to open file!");
fwrite($myfile, "<characters>");
foreach($rows as $row) {
	$race = $row["RaceName"];
	$player = $row["PlayerName"];
	// jne, lisää muut arvot mukaan
	fwrite($myfile, "<character><player>$player</player><race>$race</race></character>");
}
fwrite($myfile, "</characters>");
fclose($myfile);
echo "characters.xml luotu!";
?>

<h2>Tehtävä 4</h2>

<img src="smile.svg" />