<?php
$ok = false;
if(!empty($_POST['ktunnus']) && !empty($_POST['email']) && !empty($_POST['salasana1']) && !empty($_POST['salasana2'])) {
    $ok = TRUE;
    $nyt = date('Y-m-j');
    $email = $_POST['email'];
    $ktunnus = $_POST['ktunnus'];
    require "./tietokanta/yhteys.php";
    if($_POST['salasana1'] != $_POST['salasana2'] || tunnusta_ei_kannassa($yhteys, $ktunnus, $email) == FALSE) $ok = FALSE;
    else {
        $ktunnus = putsaa($ktunnus);

        $salasana = $_POST['salasana1'];
        $salasana = muunna_salasana($salasana);//suojataan salasana

        $sql = "INSERT INTO arvostelija (nimi,email,salasana,liittynyt) VALUES (?,?,?,?)";
        $kysely = $yhteys->prepare($sql);
        $kysely->execute(array($ktunnus, $email, $salasana, $nyt));
        if($kysely != FALSE) echo "Rekisteröityminen onnistui, tervetuloa!";
    }
}
if(!$_POST || $ok == FALSE) {
    if(!empty($_POST)) {
        GLOBAL $yhteys;
        $ktunnus = putsaa($_POST['ktunnus']);

        if(empty($_POST['ktunnus'])) echo "Käyttäjätunnus puuttuu!";
        if(empty($_POST['email'])) echo "Sähköposti puuttuu!";
        if(empty($_POST['salasana1'])) echo "Toinen salasanoista puuttuu!";
        if(empty($_POST['salasana2'])) echo "Toinen salasanoista puuttuu!";
        if(!empty($_POST['salasana1']) && !empty($_POST['salasana2']))     {
            if($_POST['salasana1'] != ($_POST['salasana2']) )echo "Salasanat eivät vastaa toisiaan!";
        }
        if(tunnusta_ei_kannassa($yhteys, $ktunnus, $email) == TRUE) echo "Käyttäjätunnus on jo käytössä, kokeile toista tunnusta.";
    }

    ?>
    <form method="post" action="./?sivu=rekisteroidy">
    
    <p>
    <label for="ktunnus">Sähköposti </label><br>
    <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
    </p>
    
    <p>
    <label for="ktunnus">Käyttäjätunnus </label><br>
    <input type="text" name="ktunnus" value="<?php if(isset($_POST['ktunnus'])) echo $_POST['ktunnus'];?>">
    </p>

    <p>
    <label for="salasana1">Salasana</label><br>
    <input type="password" name="salasana1" value="<?php if(isset($_POST['salasana1'])) echo $_POST['salasana1'];?>">
    </p>

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