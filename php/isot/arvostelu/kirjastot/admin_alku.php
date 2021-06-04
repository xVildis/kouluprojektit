<?php
require_once "./tietokanta/yhteys.php";

GLOBAL $yhteys;

$id = $_SESSION["kid"];
$sql = "SELECT * FROM arvostelija WHERE arvostelijaId = ?";
$stmt = $yhteys->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();
$username = $stmt->fetch()["nimi"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Arvostelu</title>
    <meta charset=utf-8>
    <meta name="keywords" content="sivukoe, CSS3, HTML5">
    <!--<meta name="author" content="Leena Järvenkylä-Niemi">-->
    <meta name="description" content="Vieraskirja">

    <script src="datetimepicker.js"></script>

    <link rel="stylesheet" type="text/css" href="./tyyli/sivu.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet"> 
</head>
<body>
<header>
    <div id="kotisivulinkki">
        <a class="kotilinkki" style="color:black;"><?=$username?></a>
        <a class="kotilinkki" href="admin.php">Ylläpito</a>
        <a class="kotilinkki" href="./">Kotisivu</a>
    </div>
    <nav>
        <a class="navilinkki" href="admin.php?sivu=lisaa_arvostelu">lisää arvostelu</a>
        <a class="navilinkki" href="admin.php?sivu=muokkaa_omia_tietoja">muokkaa omia tietoja</a>
        <a class="navilinkki" href="kirjaudu_ulos.php">kirjaudu ulos</a>
    </nav>
</header><!--ylaosa loppuu-->

<div id="keskiosa">
<div id="teksti">