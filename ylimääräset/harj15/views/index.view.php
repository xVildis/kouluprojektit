 <?php
include "./views/partials/head.php";
?>

<h1>Kaikki uutiset</h1>

<?php
if(isset($message)) echo $message;
?>


<?php
foreach($uutiset as $uutinen) { ?>
<h4><?=$uutinen["otsikko"];?></h4>
<?php
}
include "./views/partials/end.php";
?> 