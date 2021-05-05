<?php
include "./views/partials/head.php";
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="title">Otsikko</label><br>
<input type="text" name="title"><br>

<label for="content">Uutinen</label><br>
<textarea id="" name="content" rows="4" cols="50"></textarea>
<br>

<label for="deletionDate">Poistumisaika</label>
<select name="deletionDate" >
    <option value="2vk">2 Viikkoa</option>
    <option value="1kk">1 Kuukausi</option>
    <option value="3kk">3 Kuukautta</option>
    <option value="6kk">6 Kuukautta</option>
    <option value="1yr">1 Vuosi</option>
</select>
<br>
<input type="submit" value="Lisää uutinen">
</form>

<?php
include "./views/partials/end.php";
?> 