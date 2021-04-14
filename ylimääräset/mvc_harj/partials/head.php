<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uutiset</title>
</head>
<body>
<a href="?action=login">Kirjaudu Sisään</a> <br>
<a href="?action=register">Rekisteröidy</a>
<?php 
require("./helpers/auth.php");
if(islogged())
    echo '<a href="?controlpanel">Hallintapaneeli</a>';
?>