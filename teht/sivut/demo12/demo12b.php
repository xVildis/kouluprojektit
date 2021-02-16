<?php
include "header.php";
$ok = false;

if (isset($_COOKIE["ok"])) {
    $ok = $_COOKIE["ok"];
}
else if (isset($_POST["password"])) {
    if ($_POST["password"] == "salasana") {
        setcookie("ok",true,time() +1800); 
        echo "Tunnus oikein!";
        $ok = true;
    }
    else {
        setcookie("ok","",time() -1800); 
        echo "Tunnus väärin!";
    }
}
if (isset($_POST["logoff"])) {
    setcookie("ok",false,time() -1800);
    $ok = false;
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
include "footer.php";
?>