<?php

require "./tietokanta/yhteys.php";

//Tauluun kayttaja liittyva apufunktio

function tunnusta_ei_kannassa($yhteys, $ktunnus, $email) 
{
    GLOBAL $yhteys;

    $kysely = $yhteys->prepare("SELECT * FROM arvostelija WHERE nimi = ? OR email = ?");
    $kysely->execute(array($ktunnus, $email));
    if(!$kysely) die("Ei saatu rivejä");
    $rivimaara = $kysely->rowCount(); //laskee vastauksesta rivien määrän

    if($rivimaara == 0) return true;
    else return false;

}

/* Funktio palauttaa käyttäjän id:n*/
function hae_id_kannasta($ktunnus, $salasana) 
{
    GLOBAL $yhteys;

    $id = NULL;
    $sql = "SELECT * FROM arvostelija WHERE nimi = ? AND salasana = ?";
    $lause = $yhteys->prepare($sql);
    $lause->bindParam(1, $ktunnus);
    $lause->bindParam(2, $salasana);
    $lause->execute();

    $rivi = $lause->fetch(PDO::FETCH_ASSOC);
    if(!empty($rivi)) $id = $rivi["arvostelijaId"];

    return $id;
}

function kayttajan_nimi($kid,$yhteys) 
{
    $sql = "SELECT nimi FROM arvostelija WHERE arvostelijaId=?";

    $teksti = "";

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($kid));

    $rivi = $kysely->fetch(PDO::FETCH_ASSOC);
    if(empty($rivi)) $teksti = "Käyttäjää ei löydy.";
    else {
        $teksti = $rivi["nimi"];
    }
    return $teksti;
}

function hae_arvosteltava($arvId)
{
    GLOBAL $yhteys;

    $nimi = "";
    $sql = "SELECT arvosteltava.nimi FROM arvosteltava INNER JOIN arvostelut ON arvostelut.arvosteltavaId = arvosteltava.arvosteltavaId WHERE arvosteluId = ?";
    $stmt = $yhteys->prepare($sql);
    $stmt->bindParam(1, $arvId);
    $stmt->execute();
    $rivi = $stmt->fetch();
    
    if(!empty($rivi)) $nimi = $rivi["nimi"];

    return $nimi;
}
?>