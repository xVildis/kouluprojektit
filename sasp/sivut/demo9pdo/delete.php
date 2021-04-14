<?php
require "yhteys.php";

if (isset($_GET["id"])){
	$sql = "DELETE FROM games WHERE gameid=?";
	$data = array($_GET["id"]);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	
	header('Location: games.php');
	exit;
}

?>