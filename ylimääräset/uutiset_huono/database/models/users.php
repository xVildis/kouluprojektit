<?php

require "./database/connection.php";

function addUser($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO mvc2_articles (username, password, email) VALUES (?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data);

    return $ok;
}

//funktio tarkistaa, löytyykö käyttäjä tietokannasta
function loginUser($nickname, $password)
{
    global $pdo; //yhteys

    $sql = "SELECT username, password, email FROM mvc2_players WHERE username = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $nickname);
    $stm->execute();

    $player = $stm->fetchAll(PDO::FETCH_ASSOC);

    //tarkistetaan, vastaavatko salasanat toisiaan
    if($player) {
        if(password_verify($password, $player[0]["password"]))  {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
}

?>