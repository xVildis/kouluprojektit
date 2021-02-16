<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("data");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>



<?php
require "yhteys.php";

if (isset($_POST["name"], $_POST["company"], $_POST["release"])) {
	// lomake lähettänyt tiedot
	$name = $_POST["name"];
	$company = $_POST["company"];
	$release = $_POST["release"];
	$data = array($name, $company, $release);
	var_dump($data);
	$sql = "INSERT INTO `games` (`name`, `company`, `release`) VALUES (?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}
?>

<hr />
<h2>Insert game</h2>
<form method="post">
<input type="text" placeholder="name" value="" name="name" /><br />
<input type="text" placeholder="company" value="" name="company" /><br />
<input type="number" placeholder="2020" value="" name="release" /><br />
<input type="submit" value="insert" /><br />
</form>


<hr />
<form method="post">
<select name="company">
<option value="All">All</option>
<option value="Bethesda Game Studios">Bethesda Game Studios</option>
<option value="Ubisoft">Ubisoft</option>
<option value="Rockstar Games">Rockstar Games</option>
<option value="Remedy Entertainment">Remedy Entertainment</option>
</select>
<input type="submit" value="select" />
</form>




<?php
//require "yhteys.php";

$sql = "SELECT * FROM games";
if (isset($_POST["company"])) {
    $company = $_POST["company"];
    if ($company != "All") {
        $sql .= " WHERE company = '$company'";
    }
}
$stmt  = $pdo->query($sql);
$rows = $stmt->fetchAll();
// tai ketjussa: $rows = $pdo->query("...")->fetchAll();

//print_r($rows);

echo "<table border='1' id=\"data\"><tr><th onclick=\"sortTable(0)\">gameid</th><th onclick=\"sortTable(1)\">name</th><th onclick=\"sortTable(2)\">company</th><th onclick=\"sortTable(3)\">release</th><th>actions</th></tr>";

foreach ($rows as $row) {
    echo "<tr><td>" . $row["gameid"] . "</td><td>" . $row["name"] . "</td><td>" .$row["company"] . "</td><td>" .$row["release"] . "</td><td><a href='delete.php?id=" . $row["gameid"] . "'>delete</a> <a href='edit.php?id=" . $row["gameid"] . "'>edit</a></td></tr>";
}
echo "</table>";

?>


