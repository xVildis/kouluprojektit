<!-- 1. Lisää select  -->
<select name="koko">
<option value="koko1">koko1</option>
<option value="koko2">koko2</option>
</select>

<?php
// 2. Koodissa katsotaan mitä selectistä valittu
$sql = "SELECT * FROM joku";
if (isset($_POST["koko"]) {
  $sql .= " WHERE koko = '" . $_POST["koko"] . "'";
}

// tämän jälkeen hae tiedot

// ja näytä taulukko

?>