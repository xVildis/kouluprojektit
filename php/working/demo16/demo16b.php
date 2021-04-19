<?php
$luku1 = $_REQUEST["luku1"];
$luku2 = $_REQUEST["luku2"];
if (filter_var($luku1, FILTER_VALIDATE_INT) && filter_var($luku2, FILTER_VALIDATE_INT)) {
   echo "Kertolaskun lopputulos on " . ($luku1 * $luku2);
} 
else {
   echo "Väärä syöte!";
}
?>