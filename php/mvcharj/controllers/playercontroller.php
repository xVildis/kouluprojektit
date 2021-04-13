<?php
require "./database/models/users.php";
require "./database/models/news.php";
require "./helpers/helper.php";

function indexcontroller()
{
    $news = getAllNews();
    //var_dump($players);
    require "./views/index-view.php";
}

function admincontroller()
{
    $players = getAllNews();
    //var_dump($players);
    require "./views/admin-view.php";
}

function postregistercontroller()
{
    if(isset($_POST["nickname"],$_POST["password"],$_POST["password2"],$_POST["email"]) &&  $_POST["password"] === $_POST["password2"])   {
        echo "Formi perillä\n";
        // duplicate nickname check
        GLOBAL $pdo;
        $nickname = sanit($_POST["nickname"]);
        $password = sanitpassword($_POST["password"]);
        $email = sanit($_POST["email"]);

        $lastLogin = date('Y-m-d');

        $sql_check = "SELECT * FROM mvc2_users WHERE username = ? OR email = ?";
        $sql_data = array($nickname, $email);

        $stmt = $pdo->prepare($sql_check);
        $stmt->execute($sql_data);
        $rows = $stmt->fetchAll();

        $data = array($nickname,$password,$email);

        var_dump($data);

        if(!$rows) {
            $ok = addUser($data);
        } else {
            $ok = false;
        }

        if($ok) {
            $message = "Rekisteröinti onnistui";

            require "./views/index-view.php";
        }
        else {
            $message = "Rekisteröinti ei onnistu...";
            require "./views/registerform-view.php";
        }
    } else {
        $message = "Tiedoissa vikaa...";
        require "./views/registerform-view.php";
    }
}

function postlogincontroller()
{
   if(isset($_POST["nickname"],$_POST["password"]))  {
       $nickname = sanit($_POST["nickname"]);
       $password = sanit($_POST["password"]);

       $ok = loginUser($nickname,$password); //tietokantamallissa

       if($ok) {
           $player = getUserByNickname($nickname);
           $id = $player[0]["playerID"];
           $ip = $_SERVER["REMOTE_ADDR"];

           //asetetaan istuntomuuttujan arvot

           $_SESSION["id"] = $id;
           $_SESSION["ip"] = $ip;

           require "./views/admin-view.php";
       } else {
           $message = "Käyttäjää ei löydy";
           require "./views/loginform-view.php";
       }
   } else {
       $message = "Täytä kaikki tiedot!";
       require "./views/loginform-view.php";
   }
}

function logoutcontroller()
{
    if(isset($_SESSION["ip"],$_SESSION["id"]))  {
        session_unset(); //poistaa istuntomuuttujat
        session_destroy();//poistaa koko istunnon
        header("Location:./index.php");
    } else header("Location:./index.php");

}

?> 