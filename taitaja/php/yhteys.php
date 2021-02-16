<?php
$dsn = 'mysql:dbname=20silvil;host=localhost;charset=utf8';
$user = '20silvil';
$password = 'salasana';
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>