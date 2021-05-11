<?php

echo "<h1>Kesken</h1>";
if ($handle = opendir("./")) {
	while (false !== ($file = readdir($handle))) {
		if ('.' === $file) continue;
		if ('..' === $file) continue;
		if ('index.php' === $file) continue;

		//echo "<a href='./?sivu=".preg_replace("(\.php)", "", $file)."'>".ucfirst(preg_replace("(\.php)", "", $file))."</a><br>";
		echo "<a href='./$file'>".ucfirst(preg_replace("(\.php)", "", $file))."</a><br>";
	}
	closedir($handle);
}

echo "<h1>Isot</h1>";

if ($handle = opendir("../isot/")) {
	while (false !== ($file = readdir($handle))) {
		if ('.' === $file) continue;
		if ('..' === $file) continue;
		if ('index.php' === $file) continue;

		//echo "<a href='./?sivu=".preg_replace("(\.php)", "", $file)."'>".ucfirst(preg_replace("(\.php)", "", $file))."</a><br>";
		echo "<a href='../isot/$file'>".ucfirst(preg_replace("(\.php)", "", $file))."</a><br>";
	}
	closedir($handle);
}

/*
echo "<br>";
foreach($_SERVER as $index => $item) {
	echo $index .":		". $item . "<br>";
}
*/
?>