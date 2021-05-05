<?php
/* Ohjelma tulostaa viisi viimeistä juttua tietokannasta */

$nyt = time();//hakee tämän hetken ajankohdan timestampin
$sql = "SELECT * FROM vier_juttu WHERE poistamispvm > '".date('Y-m-j',$nyt)."' ORDER BY lisayspvm desc";//date muuttaa timestampi mysql:n ymmärtämään muotoon

require "./tietokanta/yhteys.php";
$kysely = $yhteys->query($sql);

$rivit = $kysely->rowCount();
$vastaus = $kysely->fetchAll(PDO::FETCH_ASSOC); 

if($rivit <= 5) 
    $raja = $rivit;//jos rivejä on vähemmän kuin 5, tulostetaan todellinen määrä
else 
    $raja = 5;

for($i = 0;$i<$raja;$i++) {
    $jid = $vastaus[$i]["jid"];
    $lisayspvm = $vastaus[$i]["lisayspvm"];
    $otsikko = $vastaus[$i]["otsikko"];

    $kpl = $vastaus[$i]["kpl"];
    $kid = $vastaus[$i]["kid"];

    $kirjoittaja = kayttajan_nimi($kid,$yhteys);

    echo "<h1><a href=\"././?sivu=juttu&jid=$jid\">".$otsikko."</a></h1>\n";
    echo "<h2><a href=\"././?sivu=kirjoittajan_jutut&kid=$kid\">".$kirjoittaja."</a> ".$lisayspvm." </h2>\n";
    echo "<p>".substr($kpl,0,100);
    if(strlen($kpl) > 100)
        echo " ... <a href=\"././?sivu=juttu&jid=$jid\">Lue lisää</a></p>\n";
}
?> 