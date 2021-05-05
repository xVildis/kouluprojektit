<?php
$sitename = "login";
include "./partials/head.php";
// if(isset($message)) echo $message;
?>
<div class="container">
    <form method ="post">
        <label for="nickname">Käyttäjätunnus</label><br>
        <input type="text" name="nickname"><br>

        <label for="password">Salasana</label><br>
        <input type="password" name="password"><br>

        <input type="submit" value="Kirjaudu">
    </form>
    <a href="?a=register">Rekisteröidy</a>
    <a href="?a=forgot">Salasana unohtunut?</a>
</div>

<?php
include "./partials/end.php";
?> 