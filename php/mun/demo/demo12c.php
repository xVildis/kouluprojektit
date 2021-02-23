<?php
// lomakkeenkäsittely
session_start(); // ottaa istunnon käyttöön
// apumuuttuja - ollaanko kirjauduttu
$ok = false; // oletuksena ei kirjauduttu
// -- TÄHÄN LOMAKKEENKÄSITTELIJÄ --

if (isset($_SESSION["ok"])) {
	$ok = true;
}
if (isset($_POST["password"])) {
	if ($_POST["password"] == "salasana") {
		echo "Salasana oikein!";
		$ok=true;
		$_SESSION["ok"] = true;
	}
	else {
		echo "Salasana meni väärin...";
		$ok = false;
	}
}
if (isset($_POST["logoff"])) {
	session_unset();
	session_destroy();
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