<?php
// täällä lomakkeen käsittelijä - tarkistetaan onko tiedot lähetetty
if (isset($_POST["nimi"], $_POST["ika"])) {
	$nimi = $_POST["nimi"];
	$ika = $_POST["ika"];
	echo "hei $nimi, olet siis $ika vuotta vanha!";
}
else {
// jos ei ole niin näytetään lomake
?>

<form action="./?sivu=demo5&kansio=demot" method="post" >

<label for="nimi">Syötä nimesi:</label>
<input type="text" name="nimi"><br/>
<label for="nimi">Syötä ikäsi:</label>
<input type="number" name="ika"><br/>
<input type="submit" value="Lähetä">

</form>

<?php
}
?>