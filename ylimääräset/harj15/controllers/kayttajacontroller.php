 <?php
require "./database/models/Uutinen.php";
require "./database/models/Kayttaja.php";
require "./helpers/helper.php";

function indexcontroller()
{
    $uutiset = haeKaikkiUutiset();
    //var_dump($players);
    require "./views/index.view.php";
}

function admincontroller()
{
    $players = getAllPlayers();
    //var_dump($players);
    require "./views/admin.view.php";
}

function postregistercontroller()
{
    if(isset($_POST["nickname"],$_POST["password"],$_POST["password2"],$_POST["email"],$_POST["character"])  &&  $_POST["password"] === $_POST["password2"])   {
        echo "Formi perillä";
        $username = sanit($_POST["nickname"]);
        $password = sanitpassword($_POST["password"]);
        $email = sanit($_POST["email"]);
        $current_character = sanit($_POST["character"]);
        $lastLogin = date('Y-m-d');

        $data = array($username,$password,$email,$current_character,$lastLogin);

        var_dump($data);

        $ok = addPlayer($data);

        if($ok) {
            $message = "Rekisteröinti onnistui";
            $players = getAllPlayers(); //hakee kaikki pelaajat kannasta
            require "./views/index.view.php";
        }
        else {
            $message = "Rekisteröinti ei onnistu...";
            require "./views/registerform.view.php";
        }
    } else {
        $message = "Tiedoissa vikaa...";
        require "./views/registerform.view.php";
    }
}

function postlogincontroller()
{
   if(isset($_POST["nickname"],$_POST["password"]))  {
       $username = sanit($_POST["nickname"]);
       $password = sanit($_POST["password"]);

       $ok = tarkistaLogin($username, $password); //tietokantamallissa

       if($ok) {
           $player = haeId($username);
           
           $id = $player["userId"];
           $ip = $_SERVER["REMOTE_ADDR"];

           //asetetaan istuntomuuttujan arvot

           $_SESSION["id"] = $id;
           $_SESSION["ip"] = $ip;

           $players = haeKaikkiKayttajat();
           require "./views/admin.view.php";
       } else /*if(!ok)*/ {
           $message = "Käyttäjää ei löydy";
           require "./views/loginform.view.php";
       }
   } else {
       $message = "Täytä kaikki tiedot!";
       require "./views/loginform.view.php";
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

function deleteplayercontroller()
{
    if(isset($_GET["userId"])) {
        $userId = $_GET["userId"];
        if(deletePlayer($userId)) $message="Pelaaja on poistettu";
        else $message="Pelaaja ei poistunut";
        $players = getAllPlayers();
        require "./views/admin.view.php";
    } else header("Location:./index.php?action=admin");
    /* myös 
    } else { $players = getAllPlayers();
        $message = "ei poistettavaa id:tä";
        require "./views/admin.view.php";
    }*/
}

// hakee id:n mukaan pelaajan tiedot kannasta ja antaa ne muokkauslomakkeelle
function geteditplayercontroller()
{
    if(isset($_GET["userId"])) {
        $userId=$_GET["userId"];
        $player = getPlayerById($userId);
        var_dump($player);
        require "./views/editplayerform.view.php";
    } else {
        $message="Ei valittuna pelaajaa";
        $players = getAllPlayers();
        require "./admin.view.php";
    }
}

function posteditplayercontroller()
{
    if(isset($_POST["userId"],$_POST["nickname"],$_POST["email"],$_POST["character"])) {
        $userId = $_POST["userId"];
        $username = sanit($_POST["nickname"]);
        $email = sanit($_POST["email"]);
        $current_character = sanit($_POST["character"]);
        if(isset($_POST["banned"])) $banned = 1;
        else $banned=0; 

        $data = array($username,$email,$current_character,$banned,$userId);

        if(editPlayer($data)) {
            $message = "Muokkaus on tehty";

        } else {
            $message = "Muokkaus ei onnistunut";  
        }
    } else { 
        $message = "Lomakkeelta puuttuu tietoja";         
    }
    $players = getAllPlayers();
    require "./views/admin.view.php";
}

?> 