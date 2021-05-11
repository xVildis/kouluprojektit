 <?php

require "./database/connection.php";

function haeKaikkiKayttajat()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM mvc2_users";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $kayttajat = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $kayttajat;

}

function lisaaKayttaja($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO mvc2_users (username, password) VALUES (?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}


function poistaKayttaja($id)
{
    global $pdo;

    $sql = "DELETE FROM mvc2_users WHERE kayttajaID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;
}

//funktio tarkistaa, löytyykö käyttäjä tietokannasta
function tarkistaLogin($kayttajatunnus, $salasana)
{
    global $pdo; //yhteys

    $sql = "SELECT username, password FROM mvc2_users WHERE username = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $kayttajatunnus);
    $stm->execute();

    $kayttaja = $stm->fetch(PDO::FETCH_ASSOC);

    //tarkistetaan, vastaavatko salasanat toisiaan
    if($kayttaja) {
        if(password_verify($salasana, $kayttaja["password"]))  {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
} 

function haeId($kayttajatunnus)
{
    global $pdo;

    $sql = "SELECT * FROM mvc2_users WHERE username = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $kayttajatunnus);
    $stm->execute();
    
    $kayttaja = $stm->fetch(PDO::FETCH_ASSOC);
    return $kayttaja;
} 