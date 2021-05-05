<?php
include "./views/partials/head.php";
if(isset($message)) echo $message;

$article = getArticleById($_GET["articleID"]);
var_dump($article);
?>

<form method ="post">

<input type="text" name="id" value="<?=$article["articleId"]?>" hidden>
<label for="title">Otsikko</label><br>
<input type="text" name="title" value="<?=$article["title"]?>" required ><br>

<label for="content">Uutinen</label><br>
<textarea id="" name="content" rows="4" cols="50" required><?=$article['content']?></textarea>
<br>

<label for="deletionDate">Poistumisaika</label>
<select name="deletionDate" required>
    <option value="2vk">2 Viikkoa</option>
    <option value="1kk">1 Kuukausi</option>
    <option value="3kk">3 Kuukautta</option>
    <option value="6kk">6 Kuukautta</option>
    <option value="1yr">1 Vuosi</option>
</select>
<br>
<input type="submit" value="Päivitä uutinen">
</form>

<?php
include "./views/partials/end.php";
?> 