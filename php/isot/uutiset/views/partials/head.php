<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Uutiset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
require_once "./database/models/users.php";
if(islogged())
{
?>
    <p><?=getUserName($_SESSION["id"])?></p>
    <a href="./?action=logout">Kirjaudu ulos</a><br>
    <a href="./?action=createarticle">Kirjoita uusi artikkeli</a><br>
<?php 
} else 
{?>
    <a href="./?action=register">Rekisteröidy</a><br>
    <a href="./?action=login">Kirjaudu</a><br>
<?php 
}
?>
<hr>