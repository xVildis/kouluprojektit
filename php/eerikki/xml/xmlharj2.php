<?php
$xml=simplexml_load_file("ruokalista.xml") or die("Error: tiedosto!");
echo "<h1>Ruokalista</h1>";
foreach($xml->children() as $ruoka) {
	
  echo "<h2>" . $ruoka->nimi . "</h2><p>hinta: " . $ruoka->hinta . "</p><p><img width='200' src='" . $ruoka->kuva . "' /></p>";
}

?>