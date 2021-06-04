<?php
    /* Ohjelma tulostaa yhden kirjoittajan jutut tietokannasta ja lisää jutun perään linkit "Muokkaa juttua" ja Poista juttu"*/

    $kid = "";
    if(isset($_SESSION["kid"])) $kid = $_SESSION["kid"];
    $sql = "SELECT * FROM arvostelut WHERE arvostelijaId = '$kid' ORDER BY aika desc";

    require "./tietokanta/yhteys.php";
    $kysely = $yhteys->query($sql);
    if(!$kysely) die("Ei saatu rivejä");
    $rivit = $kysely->rowCount();
    $vastaus = $kysely->fetchAll(PDO::FETCH_ASSOC);
    
    for($i = 0;$i < $rivit;$i++) {
        $jid = $vastaus[$i]["arvosteluId"];
        $lisayspvm = $vastaus[$i]["aika"];
        $otsikko = $vastaus[$i]["otsikko"];

        $kpl = $vastaus[$i]["teksti"];
        $kid = $vastaus[$i]["arvostelijaId"];

        $arv = $vastaus[$i]["kokonaisarvio"];

        $kirjoittaja = kayttajan_nimi($kid, $yhteys);
        $arvosteltava = hae_arvosteltava($jid);

        echo "<h1><a href=\"././?sivu=juttu&jid=$jid\">".$otsikko."</a></h1>\n";
        echo "<h2><a href=\"././?sivu=kirjoittajan_jutut&kid=$kid\">".$kirjoittaja."</a> ".$lisayspvm." </h2>\n";
        echo "<h2>$arvosteltava | $arv/10</h2>\n";
        echo "<p>".substr($kpl,0,100);
        if(strlen($kpl) > 100)
            echo " ... <a href=\"././?sivu=arvostelu&jid=$jid\">Lue lisää</a></p>\n";
        else echo "</p>";

        echo "<a href = \"admin.php?sivu=muokkaa_arvostelua&jid=$jid&mode=muokkaa\">Muokkaa juttua</a><br>\n";
        echo "<a href = \"admin.php?sivu=muokkaa_arvostelua&jid=$jid&mode=poista\">Poista juttu</a><hr>\n";
    } 

?> 