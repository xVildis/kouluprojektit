<?php
include "./views/partials/head.php";
?>

<h1>Rekisteröidy</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">
<label for="nickname">Nickname</label><br>
<input type ="text" name ="nickname" required><br>

<label for ="password">Salasana</label><br>
<input type="password" name="password" required><br>

<label for="password2">Salasana uudelleen</label><br>
<input type="password" name="password2" required><br>

<label for="email">Email</label><br>
<input type="email" name="email" required><br>

<br>

<input type="submit" value="Rekisteröidy">
</form>

<?php
include "./views/partials/end.php";
?> 