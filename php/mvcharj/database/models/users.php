<?php

require "./database/connection.php";

function addUser($data)
{
    global $pdo;
    echo "adduser: ";
    var_dump($data);
    $sql = "INSERT INTO mvc2_articles (username, password, email) VALUES (?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data);

    return $ok;
}

//funktio tarkistaa, löytyykö käyttäjä tietokannasta
function loginUser($username, $password)
{
    global $pdo;

    $sql = "SELECT username, password, email FROM mvc2_users WHERE username = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $username);
    $stm->execute();

    $user = $stm->fetch(PDO::FETCH_ASSOC);
    // var_dump($user);


    //tarkistetaan, vastaavatko salasanat toisiaan
    if($user) {
        if(password_verify($password, $user["password"]))  {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
}

?>