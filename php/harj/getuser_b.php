
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
$q = intval($_GET['q']);

$con = mysqli_connect('samarium','20silvil','salasana','20silvil');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, "20silvil");
$sql="SELECT * FROM h11_characters WHERE charID = '".$q."'";
$result = mysqli_query($con, $sql);

echo "<table>
<tr>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['level'] . "</td>";
  echo "<td>" . $row['strength'] . "</td>";
  echo "<td>" . $row['dexterity'] . "</td>";
  echo "<td>" . $row['wisdom'] . "</td>";
  echo "<td>" . $row['charisma'] . "</td>";
  echo "<td>" . $row['intelligence'] . "</td>";
  echo "<td>" . $row['hitpoints'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 