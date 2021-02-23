<?php
// lomakkeen käsittely
if (isset($_POST["keksi"])) {
	// yritetään tallentaa
	setcookie("keksi",$_POST["keksi"], time() +1800);
}
// jos lähetetään tyhjennä:
if (isset($_POST["tyhjenna"])) {
	setcookie("keksi","", time() -1800);
}

?>
<form method="post">
<label for="keksi">Syötä keksille tieto</label><br />
<input type="text" name="keksi" value="" /><br />
<input type="submit" value="Tallenna keksi" /><br />
</form>


<form method="post">
<input type="submit" name="tyhjenna" value="Tyhjennä keksi" />
</form>