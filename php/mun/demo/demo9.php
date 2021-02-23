<h2>Insert Game</h2>

<form method="post">
<input type="text" placeholder="name" value="" name="name" /><br/>
<input type="text" placeholder="company" value="" name="company" /><br/>
<input type="number" placeholder="2020" value="" name="release" /><br/>
<input type="submit" value="insert" /><br/>

</form>

<?php
// demo9.php
require "./partials/yhteys.php";


if (isset($_POST["name"], $_POST["company"], $_POST["release"])) {
	$name = $_POST["name"];
	$company = $_POST["company"];
	$release = $_POST["release"];
	// muuttujien paikalle ? -merkit
	$sql = "INSERT INTO `games` (`name`, `company`, `release`) VALUES (?, ?, ?)";
	// kerätään muuttujat taulukkoon:
	$data = array ($name, $company, $release);
	// suoritetaan sql-lause
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

?>


<?php



// haetaan sql-kyselyllä kaikki pelit
$sql = "SELECT * FROM games";

// suoritetaan kysely pdo-yhteydelle
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

// tuliko jotain?
//print_r($rows);
/*
// käydään kaikki tulokset läpi
echo "<ul>";
foreach($rows as $row) {
	echo "<li>" . $row["name"] . "</li>";
}
echo "</ul>"*/
echo "<table id='myTable2' border='1'>";
echo "<tr><th onclick=\"sortTable(0)\">gameid</th><th onclick=\"sortTable(1)\">name</th><th onclick=\"sortTable(2)\">company</th><th onclick=\"sortTable(3)\">release</th><th>actions</th></tr>";
foreach ($rows as $row) {
	echo "<tr>";
	echo "<td>" . $row["gameid"] . "</td>";
	echo "<td>" . $row["name"] . "</td>";
	echo "<td>" . $row["company"] . "</td>";
	echo "<td>" . $row["release"] . "</td>";
	echo "<td><a href='./demo/delete.php?id=" . $row["gameid"] . "'>delete</a> <a href='./demo/edit.php?id=" . $row["gameid"] . "'>edit</a></td>";
	echo "</tr>";
}
echo "</table>";
?>






















