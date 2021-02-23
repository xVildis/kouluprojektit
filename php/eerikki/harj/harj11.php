<h1>Harjoitus 11</h1>
<h2>11.2 Hahmon luonti</h2>
<!-- 2. sitten lomakkeen käsittelijä php:lla
- if isset()
- insert into -sql-lause
 -->
<?php
// harjoitus 11.2 - hahmon luonti
require "./demot/yhteys.php";

if (isset($_POST["name"], $_POST["raceID"], $_POST["classID"])) {
	$data = array($_POST["name"], $_POST["raceID"], $_POST["classID"]);	
	//print_r($data);
	$sql = "INSERT INTO `h11_character` (`name`, raceID, classID) values (?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}
?>
 
 
<!-- 1. tee ensin lomake -->

<form method="post">
<input type="text" name="name" placeholder="Input name" /><br />
<select name="classID">
<?php
$sql = "SELECT * FROM h11_class";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

foreach($rows as $row) {
	$classid = $row["classID"];
	$name = $row["name"];
	echo "<option value='$classid'>$name</option>";
}
// tee sama myös race-taululle..
?>
</select><br />
<select name="raceID">
<?php
$sql = "SELECT * FROM h11_race";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

foreach($rows as $row) {
	$raceID = $row["raceID"];
	$name = $row["name"];
	echo "<option value='$raceID'>$name</option>";
}
?>
</select><br />
<input type="submit" value="Save character" />
</form>

<h2>Syötetyt hahmot</h2>

<?php
$sql = "SELECT h11_race.name AS RaceName, h11_class.name AS ClassName, h11_character.name As PlayerName, h11_character.* FROM `h11_character` inner join h11_race on h11_race.raceid=h11_character.raceID inner join h11_class on h11_class.classID=h11_character.classID ";

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

echo "<ul>";
foreach($rows as $row) {
	echo "<li>" . $row["RaceName"] . $row["ClassName"] . $row["PlayerName"] ."</li>";
}
echo "</ul>";
?>
