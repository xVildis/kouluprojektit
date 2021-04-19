<?php
echo "<h2>MVC Harjoitus</h2>";
echo "<a href='../mvcharj/'>MVC Harjoitus</a>";


$paths = array("harj", "demo", "partials");
foreach($paths as $path) {

    if($path === "harj")
        echo "<h2>Harjoitukset</h2>";
    elseif($path === "demo")
        echo "<h2>Demot</h2>";
    else
        echo "<h2>Partials</h2>";

    if ($handle = opendir("./".$path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;
            if ('tyyli.css' === $file) continue;

        
            echo "<a href='./?sivu=".preg_replace("(\.php)", "", $file)."&kansio=$path'>".ucfirst(preg_replace("(\.php)", "", $file))."</a><br>";
        }
        closedir($handle);
    }
}
?>
