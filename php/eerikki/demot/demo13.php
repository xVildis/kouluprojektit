<h1>Demo 13</h1>

<h2>Tiedoston kirjoittaminen</h2>
<?php

// uusi DOMDocument
$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$xml_file_name = 'menu.xml';

// luodaan juurielementti	
$root = $dom->createElement('menu');
// -----------------------------------------
// monista tämä kohta:
// -----------------------------------------
// luodaan ruoka-elementti
$ruoka = $dom->createElement('ruoka');
$attr_ruoka_id = new DOMAttr('id', '1');
$ruoka->setAttributeNode($attr_ruoka_id);

// ruoka-elementin lapset
$lapsi1 = $dom->createElement('nimi', 'Maa-artisokkakeitto');
$ruoka->appendChild($lapsi1);

$lapsi2 = $dom->createElement('hinta', 50);
$ruoka->appendChild($lapsi2);

$lapsi3 = $dom->createElement('laktoositon', 'kyllä');
$ruoka->appendChild($lapsi3);

// ruoka juurielementille
$root->appendChild($ruoka);
// -----------------------------------------
// luodaan ruoka-elementti
$ruoka = $dom->createElement('ruoka');
$attr_ruoka_id = new DOMAttr('id', '2');
$ruoka->setAttributeNode($attr_ruoka_id);

// ruoka-elementin lapset
$lapsi1 = $dom->createElement('nimi', 'Hernekeitto');
$ruoka->appendChild($lapsi1);

$lapsi2 = $dom->createElement('hinta', 30);
$ruoka->appendChild($lapsi2);

$lapsi3 = $dom->createElement('laktoositon', 'kyllä');
$ruoka->appendChild($lapsi3);

// ruoka juurielementille
$root->appendChild($ruoka);
// -----------------------------------------
// luodaan ruoka-elementti
$ruoka = $dom->createElement('ruoka');
$attr_ruoka_id = new DOMAttr('id', '3');
$ruoka->setAttributeNode($attr_ruoka_id);

// ruoka-elementin lapset
$lapsi1 = $dom->createElement('nimi', 'Pizza');
$ruoka->appendChild($lapsi1);

$lapsi2 = $dom->createElement('hinta', 60);
$ruoka->appendChild($lapsi2);

$lapsi3 = $dom->createElement('laktoositon', 'ei');
$ruoka->appendChild($lapsi3);

// ruoka juurielementille
$root->appendChild($ruoka);
// -----------------------------------------
// juurielementti dom-dokumentille
$dom->appendChild($root);

$dom->save($xml_file_name);

echo "$xml_file_name -tiedosto kirjoitettu";


?>

<h2>2. Tiedoston lukeminen</h2>
<?php
$xml=simplexml_load_file("menu.xml") or die("Error: tiedosto!");

foreach($xml->children() as $ruoka) {
  echo $ruoka->nimi . ", hinta: " . $ruoka->hinta .  "<br>";
}

?>


