<?php
    /* Ohjelma tulostaa yhden kirjoittajan jutut tietokannasta ja lisää jutun perään linkit "Muokkaa juttua" ja Poista juttu"*/

    $kid = "";
    if(isset($_SESSION["kid"])) $kid = $_SESSION["kid"];
    $sql = "SELECT * FROM vier_juttu WHERE kid = '$kid' ORDER BY lisayspvm desc";

    require "./tietokanta/yhteys.php";
    $kysely = $yhteys->query($sql);
    if(!$kysely) die("Ei saatu rivejä");
    $rivit = $kysely->rowCount();
    $vastaus = $kysely->fetchAll(PDO::FETCH_ASSOC);
    
    for($i = 0;$i < $rivit;$i++) {
        $jid = $vastaus[$i]["jid"];
        $lisayspvm = $vastaus[$i]["lisayspvm"];
        $otsikko = $vastaus[$i]["otsikko"];

        $kpl = $vastaus[$i]["kpl"];
        $kid = $vastaus[$i]["kid"];

        $kirjoittaja = kayttajan_nimi($kid, $yhteys);

        echo "<h1>".$otsikko."</h1>\n";
        echo "<p>".$kpl."</p>\n";
        echo "<p>$lisayspvm</p>";
        echo "<a href = \"admin.php?sivu=muokkaa_juttua&jid=$jid&mode=muokkaa\">Muokkaa juttua</a><br>\n";
        echo "<a href = \"admin.php?sivu=muokkaa_juttua&jid=$jid&mode=poista\">Poista juttu</a><hr>\n";
    } 

?> 