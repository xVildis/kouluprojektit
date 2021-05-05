<?php
// demo4_lomakkeenkasittelija.php
if (isset($_POST["nimi"])) {
	$nimi = $_POST["nimi"];
	echo "Terve " . $nimi . "!";
	
}
?>