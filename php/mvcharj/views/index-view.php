<?php
include "./views/partials/head.php";

?>

<h1>Uutiset</h1>

<?php
if(isset($message)) echo $message;

foreach($articles as $article) {
    echo makeArticle($article);
}

include "./views/partials/end.php";
?> 