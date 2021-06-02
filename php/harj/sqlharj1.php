<html>
<h4>SQL-harjoitus 1</h4>

<ol>
<li>Hae kaikki keikkapaikat jotka sijaitsevat Tampereella. Aseta ehto WHERE-osaan.

<pre>SELECT * FROM keikkapaikat WHERE postitoimipaikka="Tampere"</pre>

</li>

<li>Hae kaikki keikat päivämäärän mukaan nousevaan järjestykseen järjestettynä (ASC). Nyt lisätään kyselyn loppuun ORDER BY-termi.

<pre>SELECT * FROM keikat ORDER BY ASC</pre>

</li>
<li>Hae kaikki esiintyjät joiden sukunimi alkaa tietyllä kirjaimella. Nyt tarvitset ehdossa LIKE-termiä ja katkaisumerkkiä.</li>
<pre>SELECT * FROM esiintyjät WHERE sukunimi LIKE %a%</pre>

<li>Tee kysely, jonka avulla saat selville kaikkien managerien tiedot nimien mukaisessa aakkosjärjestyksessä (sukunimi ensisijainen ja etunimi toissijainen lajittelukenttä).</li>
<pre>SELECT * FROM managerit ORDER BY sukunimi, etunimi ASC</pre>

</ol>
</html>