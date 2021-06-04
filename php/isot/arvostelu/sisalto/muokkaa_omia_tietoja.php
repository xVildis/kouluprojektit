<?php

require "./tietokanta/yhteys.php";
$kid = $_SESSION["kid"];//hakee kirjautumisen kohdalla luodusta istuntomuuttujasta kirjautuneen käyttäjän kid:n


if(isset($_GET["mode"])) $mode = $_GET["mode"];
else $mode = "muokkaa";

$istuntosalasana = $_SESSION["salasana"];//otetaan muuttujaan salasana, joka käyttäjällä on kirjautuessa
$tiedotok = false;
if(!empty($_POST["ktunnus"]) && !empty($_POST["vanhasalasana"]) && muunna_salasana($_POST["vanhasalasana"]) == $istuntosalasana) {
    //otetaan lähetetyt tiedot muuttujiin
    $etunimi = putsaa($_POST["etunimi"]);
    $sukunimi = putsaa($_POST["sukunimi"]);

    $tiedotok = true;

    //haetaan uudet salasanat ja tarkistetaan, että ne ovat samat. Jos ovat samat, otetaan uusi salasana muuttujaan $salasana
    if(!empty($_POST["salasana"]) && !empty($_POST["tokasalasana"]))     {

        if(putsaa($_POST["salasana"]) == putsaa($_POST["tokasalasana"])) {

            $salasana = muunna_salasana($_POST["salasana"]);
        }
        // jos eivät ole samat, mitään muutoksia ei tehdä
        else {
            $tiedotok = FALSE;
            echo "Uudet salasanat eivät vastaa toisiaan, muutoksia ei tehdä!<br>";
        }
    }
    //jos ei annettu, salasana napataan istunnosta eli vanha salasana jää voimaan
    else  {
    $salasana = $istuntosalasana;    
    }

    // salasanasuojataan lomakkeella annettu vanha salasana
    $vanhasalasana = muunna_salasana($_POST["vanhasalasana"]);

    //jos annettu vanha ei vastaa istunnossa olevaa salasanaa, muutosta ei tehdä
    if($istuntosalasana!= $vanhasalasana) {
        $tiedotok = FALSE;
        echo "Anna alkuperäinen salasana oikein!<br>";
    }

    if($tiedotok == true) {
        //rakennetaan sql-lause
        $sql="UPDATE arvostelija SET salasana=:salasana WHERE arvostelijaId=:kid;";
        $kysely = $yhteys->prepare($sql);
        $kysely->execute(array(":salasana" => $salasana,":kid" => $kid));

        if($kysely) {
            echo "Tiedot muutettu";
            $tiedotok = true;
            $_SESSION["salasana"] = $salasana; //vaihdetaan istunnon salasanaa
        }
    }
} 

//jos tietoja puuttuu tai ei ole lähetetty lomaketta, haetaan olemassaolevat tiedot kannasta
if($tiedotok == false){

    $sql = "SELECT * FROM arvostelija WHERE arvostelijaId='$kid'";//huom, tieto istunnosta, ei vaarallinen
    $kysely = $yhteys->query($sql);
    if(!$kysely) echo "Käyttäjää ei löydy.";
    else {//arvot kannasta muuttujiin 
        $rivi = $kysely->fetch(PDO::FETCH_ASSOC);

        $ktunnus = $rivi["nimi"];
        $salasana = $rivi["salasana"];
    }
?>

    <form action="admin.php?sivu=muokkaa_omia_tietoja&mode=muokkaa&kid=<?=$kid;?>" method="post">

    <p>
    <label for="ktunnus">Käyttäjätunnus *</label><br><?php if(isset($ktunnus)) echo $ktunnus;//näyttää ktunnus arvon;?>
    <input type="hidden" name="ktunnus" value="<?php if(isset($ktunnus)) echo $ktunnus;//piilokenttä, ei näy, mutta siirtyy ?>">
    </p>
    
    <p>    Salasanan muutos</p>
    
    <p>
    <label for="salasana">Uusi salasana </label><br>
    <input type="password" name="salasana">
    </p>
    
    <p>
    <label for="tokasalasana">Uusi salasana uudelleen </label><br>
    <input type="password" name="tokasalasana"?>
    </p>
    
    <p>
    <label for="vanhasalasana">* Vanha salasana (pakollinen kaikissa muutoksissa)</label><br>
    <input type="password" name="vanhasalasana">
    </p>
    
    <p>
    <input class="button" type="submit" value="Muuta tiedot">
    </p>
    
    </form>

<?php
}
?> 