<?php
require_once "../partials/yhteys.php";
if(isset($ok)) echo "Tapahtuma lisätty";

if(isset($_POST["tapahtuma_nimi"], $_POST["tapahtuma_pvm"])) {
    $sql = "INSERT INTO h10_tapahtumat (nimi, paivays) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $_POST["tapahtuma_nimi"]); 
    $stmt->bindParam(2, $_POST["tapahtuma_pvm"]);
    $ok = $stmt->execute();

    header("Location: ../?sivu=harj10&kansio=harj#table");
} else {
?>

<form action="" method="POST">
    <label for="tapahtuma_nimi">Tapahtuman nimi</label>
    <input type="text" name="tapahtuma_nimi" id="1">
    <br>
    <label for="tapahtuma_pvm">Päivämäärä</label>
    <input type="date" name="tapahtuma_pvm" id="2">
    <br>
    <input type="submit" value="Lisää">
</form>
<?php
}
?>
