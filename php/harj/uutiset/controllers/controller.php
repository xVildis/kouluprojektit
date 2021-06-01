<?php
require "./database/models/users.php";
require "./database/models/news.php";
require "./helpers/helper.php";

function indexcontroller()
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
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        $data = array($username, $password, $email);

        //echo "<br>";
        //echo "postregistercontroller: ";
        //var_dump($data);
        //echo "<br>";

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
    if(isset($_POST["nickname"], $_POST["password"]))  {
        $username = sanit($_POST["nickname"]);
        $password = sanit($_POST["password"]);

        $ok = loginUser($username, $password); //tietokantamallissa

        if($ok) {
            $user = getUserByUsername($username);
            $id = $user["userId"];
            $ip = $_SERVER["REMOTE_ADDR"];

            //asetetaan istuntomuuttujan arvot

            $_SESSION["id"] = $id;
            $_SESSION["ip"] = $ip;

            indexcontroller();
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
    if(isset($_SESSION["ip"], $_SESSION["id"]))  {
        session_unset(); //poistaa istuntomuuttujat
        session_destroy();//poistaa koko istunnon
        header("Location:./");
    } else header("Location:./");

}

function articlecontroller()
{
    if(isset($_POST["title"], $_POST["content"], $_POST["deletionDate"]))
    {
       
        $title = $_POST["title"];
        $content = $_POST["content"];

        $deletionDate = time() + getSqlDate($_POST["deletionDate"]);
        
        createArticle($title, $content, $deletionDate);
    }
}

function editcontroller()
{
    if(isset($_POST["id"], $_POST["title"], $_POST["content"], $_POST["deletionDate"]))
    {
        $deletionDate = date("Y-m-d H:m:s", time() + getSqlDate($_POST["deletionDate"]));

        global $pdo;

        $sql = "UPDATE mvc2_articles SET title = ?, content = ?, deletionDate = ? WHERE articleId = ?";
        $stm = $pdo->prepare($sql);
    
        $data = array($_POST["title"], $_POST["content"], $deletionDate, $_POST["id"]);

        $ok = $stm->execute($data);
        
        if($ok)
            $message = "<p>Uutinen päivitetty</p>";
        else
            $message = "<p>Uutista ei voitu päivittää</p>";

        require "./views/index-view.php";
    }
}
?> 