<?php
// lomakkeenkäsittely
// apumuuttuja - ollaanko kirjauduttu
$ok = false; // oletuksena ei kirjauduttu
// -- TÄHÄN LOMAKKEENKÄSITTELIJÄ --
if (isset($_COOKIE["ok"])) {
	$ok = $_COOKIE["ok"];
}
else if (isset($_POST["password"])) {
	if ($_POST["password"] == "salasana") {
		// käyttäjä antoi oikean salasanan
		setcookie("ok", true, time() +1800);
		echo "Tunnus oikein!";
		$ok = true;
	}
	else {
		// käyttäjä antoi väärän salasanan
		echo "Tunnus väärin :( ";
	}
}
// jos painettiin logoff-submit:
if (isset($_POST["logoff"])) {
	setcookie("ok","", time() -1800);
	$ok = false;
}

// 1. jos ei olla kirjauduttu
if ($ok == false) {
?>

<form method="post">
<label for="password">Syötä salasana</label><br/>
<input type="password" name="password" /><br/>
<input type="submit" value="Kirjaudu" />
</form>

<?php
}
else {
// 2. jos ollaan kirjauduttu niin
?>

<form method="post">
<input type="submit" name="logoff" value="Kirjaudu ulos" />
</form>

<?php
}
?>