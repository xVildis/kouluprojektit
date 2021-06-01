<?php
/******************************
Harjoitusten palautussivu
Saa syötteekseen HTTP-pyynnössä GET-metodissa sivu-nimisen parametrin ja kansio-nimisen parametrin

pyyntö on siis muotoa 

http://magnesium/17tvpt02A/oma.nimi/php/index.php?sivu=harj1&kansio=harj

@author:LJN
@date: 11.10.2017
******************************/
include "alku.php";

$ok = false;
session_start();
if (isset($_SESSION["eerikki"])) {
    $ok = true;
}
if (isset($_POST["password"])) {
    if ($_POST["password"] == "salasana") {
        $_SESSION["eerikki"] = true;
        $ok = true;
    }
    else {
        echo "Salasana väärin";
    }
}

if (!$ok) {
    // jos ei kunnossa niin näytetään kirjautuminen
?>

<form method="post">
<label for="password">Syötä salasana</label><br />
<input type="password" name="password" /><br />
<input type="submit" value="Kirjaudu" />
</form>

<?php
}
else {

include "navi.php";
?>


<?php

if(isset($_GET["sivu"])) 
    $sivu = $_GET["sivu"];
else
    $sivu = "demo12a";

if(isset($_GET["kansio"])) 
    $kansio = $_GET["kansio"];
else
    $kansio = "demot";
echo "<h2>Harjoitus $sivu</h2>";

$sallitut = array("harj1","harj2","harj3","demo12a","demo12b","demo13a","rdemo1","demo2","demo3","demo3_lomakkeenkasittelija","demo4","demo5");
if(in_array($sivu,$sallitut)) {
    $polku = "./".$kansio."/".$sivu.".php"; // on merkkijono ./kansio/sivu
    require $polku;
    

    echo "<h2>Lähdekoodi</h2>";
    highlight_file($polku);
}
else 
    echo "Tiedostoa ei löydy";

// päättyy else
}

require "loppu.php";
?>