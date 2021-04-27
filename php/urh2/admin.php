<?php
session_start(); //aloittaa session, huom, pelkkää html:ää ei saa tulostaa ennen tämän lähettämistä
if(!isset($_SESSION['kid']) || $_SESSION['istuntoid'] != session_id()) 
{
    header("Location: ./?sivu=kirjaudu");
    die(); // tärkeä, sivua ei voi ladata uudestaan
}
else
{

    $_SESSION["istuntoid"] = session_regenerate_id();
    $sivu = "admin_etusivu";
    if(isset($_GET["sivu"])) $sivu = $_GET["sivu"];

    require "./kirjastot/funktiot.php";//ulkoasufunktiot käyttöön
    require "./tietokanta/yhteys.php";//tietokantayhteys käyttöön
    require "./tietokanta/tkfunktiot.php";//tietokantafuntiot käyttöön

    tulosta_admin_alku();

    tulosta_admin_sisalto($sivu);

    tulosta_admin_loppu();
}
?> 