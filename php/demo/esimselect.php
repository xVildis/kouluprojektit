<form method="post">
<select name="year">
	<option value="2005">2005</option>
	<option value="2006">2006</option>
	<option value="2007">2007</option>
	<option value="2008">2008</option>
	<option value="2009">2009</option>
	<option value="2010">2010</option>
	<option value="2011">2011</option>
</select>
<select name="company">
	<option value="Rockstar Games">Rockstar Games</option>
	<option value="Bethesda Game Studios">Bethesda Game Studios</option>
	<option value="Ubisoft">Ubisoft</option>
	<option value="Remedy Entertainment">Remedy Entertainment</option>
</select>
<input type="submit" value="Näytä" />
</form>

<?php
require "./partials/yhteys.php";

$sql = "SELECT * FROM games";
if (isset($_POST["year"], $_POST["company"])) {
	// jos rajataan vuodella:
	$sql .= " WHERE `release`=? AND company=?";
	$data = array($_POST["year"], $_POST["company"]);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}
else {
	// normaalitilanne:
	$stmt = $pdo->query($sql);	
}

$rows = $stmt->fetchAll();
echo "<table border='1'>";
echo "<tr><th >gameid</th><th>name</th><th>company</th><th>release</th></tr>";
foreach ($rows as $row) {
	echo "<tr>";
	echo "<td>" . $row["gameid"] . "</td>";
	echo "<td>" . $row["name"] . "</td>";
	echo "<td>" . $row["company"] . "</td>";
	echo "<td>" . $row["release"] . "</td>";
	echo "</tr>";
}
echo "</table>";
?>
