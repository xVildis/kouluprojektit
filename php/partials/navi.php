<?php
echo "<h2>Luokkaharj</h2>";
echo "<a href='./harj/luokkaharj/'>Luokkaharjoitus</a>";
echo "<h2>XML-Harjoitus 1</h2>";
echo "<a href='./harj/xml/xmlharj1.php'>XML-Harjoitus 1</a>";
echo "<h2>MVC Harjoitus</h2>";
echo "<a href='./harj/uutiset/'>MVC Harjoitus</a>";
echo "<h2>Arvostelu</h2>";
echo "<a href='./isot/arvostelu/'>Arvostelu</a>";

$paths = array("harj", "demo", "partials");
foreach($paths as $path) {

    switch($path){
        case "harj":
            echo "<h2>Harjoitukset</h2>";
        break;
        case "demo":
            echo "<h2>Demot</h2>";
        break;
        case "partials":
            echo "<h2>Partials</h2>";
        break;
    }

    if ($handle = opendir("./".$path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;
            if (is_dir($file)) continue;

            echo "<a href='./?sivu=".preg_replace("(\.php)", "", $file)."&kansio=$path'>".ucfirst(preg_replace("(\.php)", "", $file))."</a><br>";
        }
        closedir($handle);
    }
}
?>
