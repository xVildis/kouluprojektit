<?php
// yhteys.php, tallenna demot-kansioon
$dsn = 'mysql:dbname=eerikki;host=localhost';
$user = 'eerikki';
$password = '33r1kk1';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>