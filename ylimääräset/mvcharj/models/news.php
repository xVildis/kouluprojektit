Uutinen.php

Luo siihen seuraavat funktiot ja testaa niiden toiminta (voit myös vaihtaa nimet englanniksi) :

    haeKaikkiUutiset()
    haeUutinen($id)
    lisaaUutinen($data)
    muokkaaUutista($data)
    poistaUutinen($id)

<?php

require("./database/connection.php");

function get_all_news()
{
    global $pdo;

    $sql = "SELECT * FROM news";
    $stm = $pdo->query($sql);

    $news = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $news;

}

?>

