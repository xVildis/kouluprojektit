<?php

/******************
Taulun rakenne
jid int(6) auto_increment (on siis autonumber tai laskuri-tyyppinen), pääavain
otsikko varchar(100)
kpl text
poistamispvm date NOT NULL
lisayspvm date
kid int(6)
**********************/
require "./tietokanta/yhteys.php";
if (!empty($_POST["otsikko"]) && !empty($_POST["kpl"] && !empty($_POST["arvosana"]) && (!empty($_POST["arvosteltava"]) || !($_POST["arvosteltava"] == 0)) )) {
    $lisayspvm = date('Y-m-j');
    $otsikko = $_POST['otsikko'];
    $otsikko = putsaa($otsikko);
    $kpl = $_POST['kpl'];
    $kpl = putsaa($kpl);
    $arvio = $_POST["arvosana"];
    $aid = $_POST["arvosteltava"];
    $kid = $_SESSION["kid"];

    $sql = "INSERT INTO arvostelut (otsikko,teksti,kokonaisarvio,arvosteltavaId,arvostelijaId, aika) VALUES (?,?,?,?,?,?)";

    $kysely = $yhteys->prepare($sql);
    $kysely->execute(array($otsikko, $kpl, $arvio, $aid, $kid, $lisayspvm)); 

    if($kysely != FALSE) 
        header("Location: ../");
    else 
        echo "Lisäys ei onnistunut, yritä myöhemmin uudelleen";
}
else {

    echo "Täytä lomake kokonaan, pakolliset kentät on merkitty tähdellä.";
    if(isset($_POST["painike"])) {
        if (!isset($_POST['arvosteltava']) || $_POST['arvosteltava'] == 0) echo "Valitse arvosteltava asia";    
        if (!isset($_POST['otsikko'])) echo "Kirjoita otsikko";    
        if (!isset($_POST['kpl'])) echo "Kirjoita myös juttu";
        if (!isset($_POST['arvosana'])) echo "Kirjoita myös arvosana";
    }
?>

    <form action="./admin.php?sivu=lisaa_arvostelu" method="post">

    <p> 
        <select name="arvosteltava" id="arvosteltava">
    <?php
        $sql = "SELECT * FROM arvosteltava";
        $stmt = $yhteys->query($sql);
        $arvosteltavat = $stmt->fetchAll();

        foreach($arvosteltavat as $arv) {
            echo '<option value="'.$arv["arvosteltavaId"].'">'.$arv["nimi"].'</option>';
        }
    ?>
    </select>
    </p>

    <p>
    <label for="otsikko">* Otsikko</label><br>
    <input type="text" name="otsikko" value="<?php if(isset($_POST["otsikko"])) echo $_POST["otsikko"]?>">
    </p>

    <p>
    <label for="kpl">* Teksti</label><br>
    <textarea name="kpl" cols="45" rows="5"><?php if(isset($_POST["kpl"])) echo $_POST["kpl"]?></textarea>
    </p> 
    
    <p>
    <label for="arvosana">* Arvosana</label><br>
    <input type="number" name="arvosana" max="10" min="1" value="<?php if(isset($_POST["arvosana"])) echo $_POST["arvosana"]?>">
    </p>

    <p>
    <input class="button" type="submit" value="Lisää juttu" name="painike">
    </p>
    
    </form>

<?php
}
?> 