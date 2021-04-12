 <?php

require "./database/connection.php";

function haeKaikkiUutiset()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM uutinen";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $uutiset = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $uutiset;

}

function haeUutinen($id)
{
    global $pdo;

    $sql = "SELECT * FROM uutiset WHERE uutinenID = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();

    $uutinen = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $uutinen;
}



function lisaaUutinen($data)
{
    global $pdo;
    //var_dump($data);
    $sql = "INSERT INTO uutinen (otsikko,sisalto,kirjoituspvm,poistamispvm,kirjoittaja) VALUES (?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function muokkaaUutista($data)
{
    global $pdo;

    $sql ="UPDATE uutinen SET otsikko = ?, sisalto = ?, kirjoituspvm = ?, poistamispvm = ?, kirjoittaja = ? WHERE uutinenID = ?";

    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function poistaUutinen($id)
{
    global $pdo;

    $sql = "DELETE FROM uutinen WHERE uutinenID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;
}
