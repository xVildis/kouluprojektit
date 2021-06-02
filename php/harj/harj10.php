<?php
require "./partials/yhteys.php";


$sql = "SELECT * FROM h10_tapahtumat";
$tapahtumat = $pdo->query($sql)->fetchAll();

echo "<table style='width:30%' id='table'>";
foreach($tapahtumat as $tapahtuma) {
    echo "<tr>";
    echo "<td>".$tapahtuma["tapahtumaID"]."</td>";
    echo "<td><a href='./harj/h10_edit.php?id=".$tapahtuma["tapahtumaID"]."'>".$tapahtuma["nimi"]."</a></td>";
    echo "<td>".$tapahtuma["paivays"]."</td>";
    echo "<td><a href='./harj/h10_delete.php?id=".$tapahtuma["tapahtumaID"]."'>Poista Tapahtuma<a/></td>";
    echo "</tr>";
}
echo "</table> ";
echo '<form action="./harj/harj10_insert.php">
<input type="submit" value="Uusi">
</form>';


?>

<!--


Lisää painike jolla voidaan avata lomake uuden tapahtuman lisäämiseksi.

Kun haet tapahtumat näkyviin taulukkoon niin järjestä ne siten, että ylimpänä näkyvät lähinnä tulevat tapahtumat. Älä näytä taulukossa menneitä tapahtumia.

Esimerkki sivusta: tapahtumat_esimerkki.html
H10.2. Tapahtuman lisääminen

Lisätään tapahtumalle nimi ja päivämäärä. Tallenna-painikkeella tiedot viedään tietokantaan. Sivulla on linkki Palaa pääsivulle joka vie etusivulle.
H10.3. Tapahtuman poistaminen

Lisää poista_tapahtuma.php jonka avulla poistetaan GET-parametrina tullut tapahtuma.
H10.4. Tapahtuman muokkaaminen ja osallistujat

Kun avataan niin näytetään lomakkeen kentissä muokattavat tiedot. Nappia painamalla tiedot päivittyvät tietokantaan. Tietojen alapuolella näytetään lista tapahtumaan osallistuvista henkilöistä. Henkilön voi poistaa nappia painamalla. Yhteen tapahtumaan voi ilmoittautua korkeintaan viisi osallistujaa. Mikäli osallistujia on jo viisi niin lisäyspainike on disabloitu.

Osallistujan lisääminen avaa uuden sivun jolla voi lisätä osallistujan äsken avoinna olleeseen tilaisuuteen. Osallistujan tietoja ovat etunimi, sukunimi, paikkakunta ja tilaisuusid.

Esimerkki tapahtuman muokkaamisesta: tapahtumat_esimerkki2.html 

-->