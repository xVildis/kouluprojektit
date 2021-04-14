<?php
require "./partials/alku.php";
// jos ei olla kirjauduttu niin näytä kirjautumislomake

session_start();
$ok = false;

if (isset($_SESSION["ok"])) {
    $ok = true;
}
if (isset($_POST["logoff"])) {
    session_unset();
    session_destroy();
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
<label for="password">Syötä salasana</label><br/>
<input type="password" name="password" /><br/>
<input type="submit" value="Kirjaudu" />
</form>
<?php
}
else {

require "./partials/navi.php";

?>

<form method="post">
<input type="submit" name="logoff" value="Kirjaudu ulos" />
</form>

<?php

if(isset($_GET["sivu"])) $sivu = htmlentities($_GET["sivu"]);
else $sivu = "demo1"; //oletusarvo, jos ei pyyntöä

if(isset($_GET["kansio"])) $kansio = htmlentities($_GET["kansio"]);
else $kansio = "demo";

$sallitut = array("demo1","demo2","demo3","demo4","demo4_lomakkeenkasittelija","demo5","demo6"
,"demo7","demo8","demo9","demo10","demo11","demo12","demo13","harj1","harj2","harj3","harj4","harj5"
,"harj6","harj11", "harj7","harj8","harj9","demo12c","demo12b","demo12a","harj13","harj14","harj15");

if(in_array($sivu, $sallitut)) {
    $polku = "./$kansio/$sivu.php";
    require $polku;
    echo "<h3>Lähdekoodi</h3>";
    echo highlight_file($polku,1);
}

}

require "./partials/loppu.php";
?>