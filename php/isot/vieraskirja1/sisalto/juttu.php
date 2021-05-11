<?php
    /* Ohjelma tulostaa yhden jutun kannasta */

    $jid = "";
    if(isset($_GET["jid"])) $jid = $_GET['jid'];

    $sql = "SELECT * FROM vier_juttu WHERE jid = ?";

    require "./tietokanta/yhteys.php";
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($jid));

    $rivi = $kysely->fetchAll(PDO::FETCH_ASSOC);

    if(empty($rivi)) 
        echo "Juttua ei löydy ";
    else {
        $lisayspvm = $rivi["lisayspvm"];
        $otsikko = $rivi["otsikko"];
        $kpl = $rivi["kpl"];

        echo "<h1>".$otsikko."</h1>";
        echo "<p>".$lisayspvm."</p>";
        echo "<p>".$kpl."</p>";
    }
?> 