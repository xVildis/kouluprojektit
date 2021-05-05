<?php
/*  
    CREATE TABLE IF NOT EXISTS `players` (
      `playerID` int(10) NOT NULL AUTO_INCREMENT,
      `nickname` varchar(15) NOT NULL,
      `password` varchar(255) NOT NULL,
      `email` varchar(50) NOT NULL,
      `current_character` varchar(15) NOT NULL,
      `money` decimal(10,0) NOT NULL DEFAULT '500',
      `lastLogin` date NOT NULL,
      `banned` tinyint(1) NOT NULL DEFAULT '0',
      `teamID` int(10) DEFAULT NULL,
      PRIMARY KEY (`playerID`),
      KEY `teamID` (`teamID`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
*/

require "./database/connection.php";

function getAllPlayers()
{
    global $pdo; //Kohta 1 ota yhteys

    $sql = "SELECT * FROM mvc1_players";//Kohta 2 rakenna SQL
    $stm = $pdo->query($sql); //Kohta 3 suorita sql

    $players = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $players;

}

function getPlayerById($id)
{
    global $pdo;

    $sql = "SELECT * FROM mvc1_players WHERE playerID = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $id);
    $stm->execute();

    $player = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $player;
}


function getPlayerByNickname($nickname)
{
    global $pdo;

    $sql = "SELECT * FROM mvc1_players WHERE nickname = ?";
    $stm = $pdo->prepare($sql);

    $stm->bindValue(1, $nickname);
    $stm->execute();
    
    $player = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $player;
}


function addPlayer($data)
{
    global $pdo;
    var_dump($data);
    $sql = "INSERT INTO mvc1_players (nickname,password,email,current_character,lastLogin) VALUES (?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function editPlayer($data)
{
    global $pdo;

    $sql ="UPDATE mvc1_players SET nickname = ?, email = ?, current_character = ?, banned = ? WHERE playerID = ?";

    $stm = $pdo->prepare($sql);
    $ok = $stm->execute($data); //palauttaa true tai false
    return $ok;
}

function deletePlayer($id)
{
    global $pdo;

    $sql = "DELETE FROM mvc1_players WHERE playerID = ?";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id);

    $ok = $stm->execute();
    return $ok;
}

//funktio tarkistaa, löytyykö käyttäjä tietokannasta
function loginPlayer($nickname,$password)
{
    global $pdo; //yhteys

    $sql = "SELECT nickname,password FROM mvc1_players WHERE nickname = ?";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1,$nickname);
    $stm->execute();

    $player = $stm->fetchAll(PDO::FETCH_ASSOC);

    //tarkistetaan, vastaavatko salasanat toisiaan
    if($player) {
        if(password_verify($password,$player[0]["password"]))  {
            return TRUE;
        } else return FALSE;
    } else return FALSE;
}

?>