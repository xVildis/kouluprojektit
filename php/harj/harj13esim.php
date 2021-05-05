<?php
// lähetettiinkö nimi ja palaute
if (isset($_POST["nimi"], $_POST["palaute"])) {
	// tee aluksi tiedosto: 
	$file = fopen("data.csv","a");

	// aseta tiedot taulukkoon ja lisää tiedostolle:
	$data = array($_POST["nimi"], $_POST["nimi"]);
	fputcsv($file, $data, ";");
	
	// sulje tiedosto
}
?>