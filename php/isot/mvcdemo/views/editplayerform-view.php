<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">

    <input type ="hidden" name="playerID" value="<?= $player["playerID"];?>">

    <label for="nickname">Nickname</label><br>
    <input type ="text" name ="nickname" value ="<?= $player["nickname"];?>" required><br>

   
    <label for="email">Email</label><br>
    <input type="email" name="email" value ="<?= $player["email"]; ?>" required><br>

    <label for="character">Hahmo</label><br>
    <select name="character">
        <option value="hirviö"<?php if($player["current_character"] == "hirviö") echo " selected";?>>hirviö</option>
        <option value ="keiju"<?php if($player["current_character"] == "keiju") echo " selected";?>>keiju</option>
        <option value="olio"<?php if($player["current_character"] == "olio") echo " selected";?>>olio</option>
    </select>
    <br>
    <label for="banned">Bannattu</label>
    <input type ="checkbox" name="banned" <?php if($player["banned"] == 0) echo "value=\"0\"";
    else echo "value=\"1\" checked";?>><br>


    <input type="submit" value="Muuta pelaajaa">
    </form>



<?php 
include "./views/partials/end.php";
?> 