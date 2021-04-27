<?
 
$servername = "localhost";
$username = "20systeam3";
$password = "yzAqxZoMlWSlhujo";
 
$connectionString = "mysql:host=treduvmweb01.ad.tredu.fi;dbname=20systeam3;port=3306;charset=utf8";
$pdo = new PDO($connectionString,$username,$password);
 
// Create connection
$conn = mysqli_connect($servername, $username, $password);
 
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
 
?>