<?php
// yhteys.php, tallenna demot-kansioon
$dsn = 'mysql:dbname=20silvil;host=localhost';
$user = '20silvil';
$password = 'salasana';
//$password = '33r1kk1';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>