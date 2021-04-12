 <?php
$host ="samarium";
$user = "eerikki";
$pass = "33r1kk1";
$dbname = "eerikki";

try //yritetään ottaa yhteys
{ 
    $yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
    $user, $pass); 
    //luo PDO-olion
} 
catch(PDOException $e) // jos ei onnistu (poikkeus)
{ 
    echo $e->getMessage(); //antaa ilmoituksen siitä, missä virhe
}
?> 