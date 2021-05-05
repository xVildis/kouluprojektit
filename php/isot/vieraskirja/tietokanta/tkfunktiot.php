<?php

//Tauluun kayttaja liittyva apufunktio

function tunnusta_ei_kannassa($yhteys,$ktunnus) 
{
    $kysely = $yhteys->prepare("SELECT * FROM vier_kayttaja WHERE ktunnus = ?");
    $kysely->execute(array($ktunnus));
    if(!$kysely) die("Ei saatu rivejä");
    $rivimaara = $kysely->rowCount(); //laskee vastauksesta rivien määrän

    if($rivimaara == 0) return true;
    else return false;

}

/* Funktio palauttaa käyttäjän id:n*/
function hae_id_kannasta($ktunnus,$salasana) 
{
    require "./tietokanta/yhteys.php";
    $id = NULL;
    $lause = $yhteys->prepare("SELECT * FROM vier_kayttaja WHERE ktunnus=:ktunnus AND salasana=:salasana");
    $lause->bindParam(':ktunnus', $tunnari);
    $lause->bindParam(':salasana', $passu);

    $tunnari = $ktunnus;
    $passu = $salasana;

    $lause->execute();

    $rivi = $lause->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($rivi)) $id = $rivi[0]["kid"];
    return $id;
}

function kayttajan_nimi($kid,$yhteys) 
{
    $sql = "SELECT etunimi,sukunimi FROM vier_kayttaja WHERE kid=?";

    $teksti = "";

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kid));

    $rivi = $kysely->fetchAll(PDO::FETCH_ASSOC);
    if(empty($rivi)) $teksti = "Käyttäjää ei löydy.";
    else {
        $etunimi = $rivi[0]["etunimi"];
        $sukunimi = $rivi[0]["sukunimi"];
        $teksti.= $etunimi." ".$sukunimi;
    }
    return $teksti;
}

?>