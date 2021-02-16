
<?php
include "header.php";
if (isset($_POST["keksi"])) {
    setcookie("keksi",$_POST["keksi"],time() +1800); 
    //$_COOKIE["keksi"] = $_POST["keksi"];
}
if (isset($_POST["tyhjenna"])) {
    setcookie("keksi","",time() -1800); 
}
if (isset($_COOKIE["keksi"])) {
    echo "<p>Keksistä löytyi tieto: " . $_COOKIE["keksi"] . "</p>";
}
?>
<form method="post">
<label for="keksi">Syötä keksille tieto</label><br />
<input type="text" name="keksi" /><br />
<input type="submit" value="Tallenna keksi" />
</form>
<form method="post">
<input type="submit" name="tyhjenna" value="Tyhjennä keksi" />
</form>

<?php
include "footer.php";
?>