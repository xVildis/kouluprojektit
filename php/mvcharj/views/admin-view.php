<?php
include "./views/partials/adminhead.php";
?>
<h1>Hallintapaneeli</h1>

<?php
if(isset($message)) echo $message;
?>


<?php
foreach($articles as $article) { ?>

<a href="./?action=editarticle&articleID=<?= $article["articleID"];?>">Muokkaa</a><br>
<a href="./?action=deletearticle&articleID=<?= $article["articleID"];?>">Poista</a><br>

<?php
}
include "./views/partials/end.php";
?> 