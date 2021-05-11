<?php
$ok = false;
if(!empty($_POST['sukunimi']) && !empty($_POST['etunimi']) && !empty($_POST['ktunnus']) && !empty($_POST['salasana1']) && !empty($_POST['salasana2'])) {
    $ok = TRUE;
    $etunimi = $_POST['etunimi'];
    $sukunimi = $_POST['sukunimi'];
    $ktunnus = $_POST['ktunnus'];
    require "./tietokanta/yhteys.php";
    if($_POST['salasana1'] != $_POST['salasana2'] || tunnusta_ei_kannassa($yhteys,$ktunnus) == FALSE) $ok = FALSE;
    else {
        $etunimi = putsaa($etunimi);
        $sukunimi = putsaa($sukunimi);
        $ktunnus = putsaa($ktunnus);

        $salasana = $_POST['salasana1'];
        $salasana = muunna_salasana($salasana);//suojataan salasana

        $sql = "INSERT INTO vier_kayttaja (etunimi,sukunimi,ktunnus,salasana) VALUES (?,?,?,?)";
        $kysely = $yhteys->prepare($sql);
        $kysely->execute(array($etunimi,$sukunimi,$ktunnus,$salasana));
		var_dump($kysely);
        if($kysely != FALSE) echo "Rekisteröityminen onnistui, tervetuloa!";
    }
}
if(!$_POST || $ok == FALSE) {
    if(!empty($_POST))     {
        if(empty($_POST['etunimi'])) echo "Etunimi puuttuu!";
        if(empty($_POST['sukunimi'])) echo "Sukunimi puuttuu!";
        if(empty($_POST['ktunnus'])) echo "Käyttäjätunnus puuttuu!";
        if(empty($_POST['salasana1'])) echo "Toinen salasanoista puuttuu!";
        if(empty($_POST['salasana2'])) echo "Toinen salasanoista puuttuu!";
        if(!empty($_POST['salasana1']) && !empty($_POST['salasana2']))     {
            if($_POST['salasana1'] != ($_POST['salasana2']) )echo "Salasanat eivät vastaa toisiaan!";
        }
        if(tunnusta_ei_kannassa($yhteys,$ktunnus) == TRUE) echo "Käyttäjätunnus on jo käytössä, kokeile toista tunnusta.";
    }

    ?>
    <form method="post" action="./?sivu=rekisteroidy">
    
    <p>
    <label for="etunimi">Etunimi </label><br>
    <input type="text" name="etunimi" value="<?php if(isset($_POST['etunimi'])) echo $_POST['etunimi'];?>">
    </p>

    <p>
    <label for="sukunimi">Sukunimi </label><br>
    <input type="text" name="sukunimi" value="<?php if(isset($_POST["sukunimi"])) echo $_POST['sukunimi'];?>">
    </p>

    <p>
    <label for="ktunnus">Käyttäjätunnus </label><br>
    <input type="text" name="ktunnus" value="<?php if(isset($_POST['ktunnus'])) echo $_POST['ktunnus'];?>">
    </p>

    <p>
    <label for="salasana1">Salasana</label><br>
    <input type="password" name="salasana1" value="<?php if(isset($_POST['salasana1'])) echo $_POST['salasana1'];?>"></p>

    <p><label for="salasana2">Salasana uudelleen </label><br>
    <input type="password" name="salasana2" value="<?php if(isset($_POST['salasana2'])) echo $_POST['salasana2'];?>">
    </p>

    <p>
    <input class="button" type="submit" value="Rekisteröidy">
    </p>
    
    </form> 
<?php
}
?> 