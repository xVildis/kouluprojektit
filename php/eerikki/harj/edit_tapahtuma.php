<?php
// edit_tapahtuma.php
if (isset($_GET["id"])) {
	// hae id:n määrittämä tapahtuma
	// select * from 10_tapahtumat where tapahtumaid=?"
	
}

?>
<h2>Muokkaa tapahtumaa</h2>
<form method="post"> 
<label for="nimi">Nimi:</label><br />
<input type="text" name="nimi" /><br />
<label for="paivays">Päiväys:</label><br />
<input type="date" name="paivays" /><br />
</form>

<?php
// hae täällä kaikki tämän tapahtuman osallistujat
// SELECT * FROM 10_osallistujat where tapahtumaID=?
// näytä tiedot esim. taulukossa
?>