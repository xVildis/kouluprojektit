<?php
// edit_tapahtuma.php
if (isset($_GET["id"])) {
	$sql = "SELECT * FROM h10_tapahtumat WHERE tapahtumaID = ?";
	$stmt = $pdo->query($sql);
	$stmt->bindParam($_GET["id"]);
	$tapahtuma = $stmt->execute();
}

?>
<h2>Muokkaa tapahtumaa</h2>
<form method="post"> 
<label for="nimi">Nimi:</label><br/>
<input type="text" name="nimi" value="<?=$tapahtuma["nimi"]?>" /><br/>
<label for="paivays">Päiväys:</label><br/>
<input type="date" name="paivays" value="<?=$tapahtuma["nimi"]?>"/><br/>
</form>

<?php
// hae täällä kaikki tämän tapahtuman osallistujat
// SELECT * FROM 10_osallistujat where tapahtumaID=?
// näytä tiedot esim. taulukossa
?>