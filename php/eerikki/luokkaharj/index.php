<?php
// index.php
// harj 14.3
// täällä luodaan hahmo ja kutsutaan
// muita tiedostoja 

require "character.php";

$first = new Character("Uusi tyyppi");

require "character.view.php";
?>
