
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

function sanit($input)
{
    $input = trim($input); //poistaa tyhjät välilyönnit alusta ja lopusta
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
}

function makeArticle($article)
{
    $articleId = (int)$article["articleId"];
    
    $title = sanit($article["title"]);
    $content = sanit($article["content"]);

    $beautified = "<div style='border: 1px solid black;margin-bottom: 20px; margin-top: 20px;padding-left: 10px' id='$articleId'><h2>$title</h2><div><p>$content</p>";

    $beautified .= "</div></div>";
    return $beautified;
}

?>

<?php


$q = $_GET['q'];

$con = mysqli_connect('samarium','20silvil','salasana','20silvil');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "20silvil");

$sql="SELECT * FROM mvc2_articles WHERE title LIKE '%$q%' OR content LIKE '%$q%'";
$result = mysqli_query($con, $sql);

echo "<table>
<tr>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo makeArticle($row);
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 