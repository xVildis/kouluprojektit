<?php
session_start();//istunto käyttöön
header("Pragma: No-cache"); //poistaa välimuistista tiedot

$ok = false;
if (isset($_SESSION["ok"])) {
    $ok = true;
}
if (isset($_POST["logoff"])) {
    session_unset();
    session_destroy(); //tuhoaa tämän tiedoston alussa luodun uuden istunnon
    $ok = false;
}
else if (isset($_POST["password"])) {
    if ($_POST["password"] == "salasana") {
        $ok = true;
        $_SESSION["ok"] = true;
        echo "salasana oikein";
    }
    else {
        echo "salasana väärin";
        $ok = false;
    }
}

if (!$ok) {

?>

<form method="post">
<label for="password">Syötä salasana</label><br />
<input type="password" name="password" /><br />
<input type="submit" value="Kirjaudu" />
</form>

<?php
}
else {
?>    
<form method="post">
<input type="submit" name="logoff" value="Kirjaudu ulos" />
</form>

<?php
}
?>