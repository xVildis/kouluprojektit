<?php

$dsn = 'mysql:dbname=20silvil;host=localhost';
$user = '20silvil';
$password = 'salasana';


try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>