<?php
// edit.php, demo9
require "yhteys.php";

// tuli id-pääsivulta -> haetaan muokattava tietue
if (isset($_GET["id"])) {
	$sql = "SELECT * FROM games WHERE gameid=?";
	$data = array($_GET["id"]);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	$rows = $stmt->fetchAll();
	//var_dump($rows); // tarkistetaan tuliko jotain?
	if (!$rows) {
		echo "No games!";
	}
	else {
		// löytyi peli
		$name = $rows[0]["name"];
		$company = $rows[0]["company"];
		$release = $rows[0]["release"];
		$gameid = $rows[0]["gameid"];
	}
}

// jos tallennetaan
if (isset($_POST["name"], $_POST["company"], $_POST["release"], $_POST["gameid"])) {
	// kerätään muuttujat taulukkoon:
	$data = array($_POST["name"], $_POST["company"], $_POST["release"], $_POST["gameid"]);
	// sql-lause
	$sql = "UPDATE games SET name=?, company=?, `release`=? WHERE gameid=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	header('Location: ../index.php?sivu=demo9&kansio=demot');
	exit;
	
}


?>
<h2>Edit game</h2>
<form method="post">
<input type="text" value="<?php echo $name; ?>" name="name" /><br />
<input type="text" value="<?php echo $company; ?>" name="company" /><br />
<input type="number" value="<?php echo $release; ?>" name="release" /><br />
<input type="hidden" name="gameid" value="<?php echo $gameid; ?>" />
<input type="submit" value="Save" /><br />
</form>

