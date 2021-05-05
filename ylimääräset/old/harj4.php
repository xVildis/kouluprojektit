<?php
// 4.1 käsittelijä
if (isset($_POST["rahat"])) {
	// ota muuttuja talteen
	$rahat = $_POST["rahat"];
	// laske tulos
	$bensamaara = round($rahat / 1.5, 2);
	// tulosta tiedot käyttäjälle
	echo "Saat 95:sta $bensamaara litraa";
}

?>

<h1>Harjoitukset 4</h1>
<h2>4.1 bensalaskuri</h2>
<!-- bensalaskuri 
mieti mitä tietoja käyttäjältä tarvitaan
-->
<form method="post">
<label for="rahat">Anna rahamäärä:</label><br/>
<input type="number" name="rahat" step="0.1" /><br/>
<input type="submit" value="Laske" />
</form>

<?php
// harj 4.2 käsittelijä
if (isset($_POST["ostokset"], $_POST["summa"])) {
	// jos löytyy niin lähetetty tehtävä 2
	// ota muuttujat talteen
	$ostokset = $_POST["ostokset"];
	$summa = $_POST["summa"];
	// laske tulos
	$tulos = $summa - $ostokset; 
	// tulosta käyttäjälle
	
}

?>

<h2>4.2 loppusumma</h2>
<!-- bensalaskuri 
mieti mitä tietoja käyttäjältä tarvitaan
-->
<form method="post">
<label for="ostokset">Ostosten hinta:</label><br/>
<input type="number" name="ostokset" step="0.1" /><br/>
<label for="summa">Anna rahamäärä:</label><br/>
<input type="number" name="summa" step="0.1" /><br/>
<input type="submit" value="Laske" />
</form>


<h2>Arvonlisävero</h2>


<h2>Harjoitus 4.5 - valintarakenne</h2>

<form method="post"> 
<label for="arvosana">Syötä arvosana</label>
<select name="arvosana">
	<option value="0">0</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
</select>

</form>


