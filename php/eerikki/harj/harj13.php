
<h2>H13.1 Rekisteröityminen</h2>
<?php
$salasanaok = false;
$lomakeok = false;

// if isset -lomakkeenkäsittelijä
if (isset($_POST["nimi"], $_POST["tunnus"], $_POST["salasana"])) {
	// käsittele muuttujat 
	$nimi = htmlspecialchars($_POST["nimi"]);
	$tunnus = htmlspecialchars($_POST["tunnus"]);
	$salasana = htmlspecialchars($_POST["salasana"]);
	echo "Lähetettiin: $nimi , $tunnus, $salasana";
	// onko salasana riittävä?
	// - tarkista pituus ja sisältääkö numeron
	if (!preg_match('~[0-9]+~', $salasana)) {
		echo 'Syötä salasanaan numero';
	}
	else if (strlen($salasana) < 6) {
		echo 'Salasana liian lyhyt';
	}
	else {
		$salasanaok = true;
	}
	$lomakeok = true;
	
}

// jos lomake ei ok niin näytetään lomake
if (!$lomakeok || !$salasanaok) {
?>

<form method="post">
<label for="nimi">nimi *</label><br />
<input type="text" name="nimi" size="30" required /><br />
<label for="tunnus">käyttäjätunnus *</label><br />
<input type="text" name="tunnus" size="30"  required /><br />
<label for="salasana">salasana *</label><br />
<input type="password" name="salasana" required /><br />
<label for="syntymaaika">syntymäaika</label><br />
<input type="date" name="syntymaaika" /><br />
<label for="puhelinnumero">puhelinnumero</label><br />
<input type="tel" placeholder="040 1234567" pattern="[0-9]{3} [0-9]{7}" name="puhelinnumero" /><br />
<label for="email">sähköposti *</label><br />
<input type="email" name="email"  required /><br />
<label for="kotisivu">käyttäjän kotisivu </label><br />
<input type="url" name="kotisivu" /><br />
<label for="esittely">esittely</label><br />
<textarea rows="4">
</textarea><br />
<input type="submit" value="Lähetä tiedot" />
</form>
<?php
}
?>