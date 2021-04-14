<?php
require "./database/models/users.php";
require "./database/models/news.php";
require "./helpers/helper.php";

function indexcontroller()
{
    require "./views/index-view.php";
}

function admincontroller()
{
    require "./views/index-view.php";
}

function postregistercontroller()
{
    if(isset($_POST["nickname"],$_POST["password"],$_POST["password2"],$_POST["email"]) &&  $_POST["password"] === $_POST["password2"])   {
        echo "Formi perillä\n";
        // duplicate nickname check
        GLOBAL $pdo;
        $username = sanit($_POST["nickname"]);
        $password = sanitpassword($_POST["password"]);
        $email = sanit($_POST["email"]);

        // $lastLogin = date('Y-m-d');

        $sql_check = "SELECT * FROM mvc2_users WHERE username = ? OR email = ?";
        $sql_data = array($username, $email);

        $stmt = $pdo->prepare($sql_check);
        $stmt->execute($sql_data);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = array($username, $password, $email);

        echo "<br>";
        echo "postregistercontroller: ";
        var_dump($data);
        echo "<br>";

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
       $username = sanit($_POST["nickname"]);
       $password = sanit($_POST["password"]);

       $ok = loginUser($username,$password); //tietokantamallissa

       if($ok) {
           $user = getUserByUsername($username);
           $id = $user["userId"];
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
        header("Location:./");
    } else header("Location:./");

}

?> 