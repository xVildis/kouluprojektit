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
if(isset($_GET["jid"])) $jid = $_GET["jid"];
else $jid = "";

if(isset($_GET["mode"])) $mode = $_GET["mode"];
else $mode = "muokkaa";
if($mode == "poista")
{
    $sql1 = "SELECT * FROM arvostelut WHERE arvosteluId = ?";
    $stm = $yhteys->prepare($sql1);
    $stm->bindParam(1, $_GET["jid"]);
    $stm->execute();

    $arvs = $stm->fetch();
    $owner = $arvs["arvostelijaId"];

    if($_SESSION["kid"] === $owner)
    {
        $sql = "DELETE FROM arvostelut WHERE arvosteluId = ?"; 
        $kysely = $yhteys->prepare($sql); 
        $kysely->execute(array($jid));
        header("Location:admin.php");
    } else {
        echo "Ei oikeuksia";
    }

}

if($mode == "muokkaa") {
    if(!empty($_POST["otsikko"]) && !empty($_POST["kpl"]) && !empty($_POST["arvosana"])) {
        $otsikko = $_POST['otsikko'];
        $otsikko = putsaa($otsikko);
        $kpl = $_POST['kpl'];
        $kpl = putsaa($kpl);

        $arv = $_POST["arvosana"];

        $kid = $_SESSION["kid"];

        $sql = "UPDATE arvostelut SET otsikko=:otsikko, teksti=:kpl, kokonaisarvio=:arv WHERE arvosteluId=:jid";

        $kysely = $yhteys->prepare($sql);
        $kysely->execute(array(":otsikko" => $otsikko, 
                               ":arv" => $arv, 
                               ":kpl" => $kpl,
                               ":jid" => $jid));

        if($kysely) {
            echo "Tiedot muutettu!<br>";
            echo "<a href=\"admin.php\">Palaa juttuluetteloon.</a><br>";
        }
    } 
    else {
        $sql = "SELECT * FROM arvostelut WHERE arvosteluId = ?";
        $kysely = $yhteys->prepare($sql);
        $kysely->execute(array($jid));
        $rivi = $kysely->fetch(PDO::FETCH_ASSOC); 
        if(!$rivi) 
            echo "Juttua ei löydy ";
        else {
            $jid = $rivi["arvosteluId"];
            $aika = $rivi["aika"];
            $otsikko = $rivi["otsikko"];
            $arvio = $rivi["kokonaisarvio"];
            $kpl = $rivi["teksti"];
            $kid = $rivi["arvostelijaId"];
            ?>
            <form action="./admin.php?sivu=muokkaa_arvostelua&mode=muokkaa&jid=<?php echo $jid;?>" method="post">
                <p>
                <label for="otsikko">* Otsikko</label><br>
                <input type="text" name="otsikko" value="<?=$otsikko?>">
                </p>
                
                <p>
                <label for="kpl">* Teksti</label><br>
                <textarea name="kpl" cols="45" rows="5"><?=$kpl?></textarea>
                </p> 
                
                <p>
                <label for="arvosana">* Arvosana</label><br>
                <input type="number" name="arvosana" max="10" min="1" value="<?=$arvio?>">
                </p>
                
                <p>
                <input class="button" type="submit" value="Lisää juttu" name="painike">
                </p>  
            </form>
            <?php
        }
    }
}