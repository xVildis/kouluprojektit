
<?php
require_once "yhteys.php";

$username = $name = $address = $phone = "";
$username_err = $name_err = $address_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["nimi"]))){
        $name_err = "Kirjoita nimesi";     
    } else{
        $name = trim($_POST["nimi"]);
    }
    
    if(empty(trim($_POST["sahkoposti"]))){
        $username_err = "Kirjoita sähköposti";
    } else{
        $username = trim($_POST["sahkoposti"]);
    }

    if(empty(trim($_POST["postiosoite"]))){
        $address_err = "Kirjoita postiosoite";     
    } else{
        $address = trim($_POST["postiosoite"]);
    }

    if(empty(trim($_POST["puhelin"]))){
        $phone_err = "Kirjoita puhelinnumero";     
    } else{
        $phone = trim($_POST["puhelin"]);
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($username_err) && empty($phone_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO asiakkaat (nimi, postiosoite, sahkoposti, puhelin) VALUES (:nimi, :postiosoite, :sahkoposti, :puhelin)";
         
        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":nimi", $param_name, PDO::PARAM_STR);
            $stmt->bindParam(":postiosoite", $param_address, PDO::PARAM_STR);
            $stmt->bindParam(":sahkoposti", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":puhelin", $param_phone, PDO::PARAM_STR);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_username = password_hash($username, PASSWORD_ARGON2I);
            $param_phone = $phone;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // kun tiedot tallennettu mitä tehdä???
				echo "Kiitos tilauksesta";
                header("Location: ../");
            } else{
                echo "Jokin meni pieleen, yritä myöhemmin uudelleen.";
            }

            // Close statement
            unset($stmt);
        }
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekisteröidy</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<form action="" method="post">
  <div class="container">
    <h1>Tilaustiedot</h1>
    <p>Täytä kaikki kentät</p>
    <hr>

    <label for="nimi"><b>Nimi</b></label>
    <br>
    <input type="text" placeholder="Koko nimesi" name="nimi" required>
    <br>

    <label for="sahkoposti"><b>Sähköposti</b></label>
    <br>
    <input type="text" placeholder="Sähköposti" name="sahkoposti" id="email" required>
    <br>

    <label for="postiosoite"><b>Postiosoite</b></label>
    <br>
    <input type="text" placeholder="Postiosoite" name="postiosoite" required>
    <br>

    <label for="puhelin"><b>Puhelinnumero</b></label>
    <br>
    <input type="text" placeholder="Puhelinnumero" name="puhelin" required>
    <hr>

    <div id="tietoja">
        <div id="toimitustapa">
            <h1>Toimitustapa</h1>
            <br>
            <label class="radiocontainer">
                <h3>Nouto</h3>
                <input type="radio" checked="checked" name="toimitustapa" id="nouto" value="Nouto">
            </label>
            <label class="radiocontainer">
                <h3>Matkahuolto</h3>
                <input type="radio" name="toimitustapa" id="matkahuolto" value="Matkahuolto">
            </label>
        </div>

        <div id="renkaan-tiedot">
            <?php 
            $tire_query = "SELECT * FROM renkaat WHERE RengasID=?";
            $data = array($_GET["id"]);
            $id = $_GET["id"];
            $amount = $_GET["amount"];

            $stmt = $pdo->prepare($tire_query);
		    $stmt->execute($data);
		    $row = $stmt->fetch();

			switch($row["Merkki"]) 
			{
				case "Hankook":
					$kuvanimi = "hankook.jpg";
					break;
				case "Nokian":
					$kuvanimi = "nokian.jpg";
					break;
				case "Kumho":
					$kuvanimi = "kumho.jpg";
					break;
				default:
					break;
            }
            echo "<table id='my-table2'>";
			echo "<tr class='rengas-rivi'>";
			if($id == 28)
				echo "<td><img src='../img/nokian.jpg' alt=''></td>";
			else
                echo "<td><img src='../img/$kuvanimi' alt=''></td>";
            echo "<td>Määrä <br>$amount</td>";
		    echo "<td>". $row["Merkki"] ."</td>";
		    echo "<td>". $row["Malli"] ."</td>";
		    echo "<td>". $row["Tyyppi"] ."</td>";
		    echo "<td>". $row["Koko"] ."</td>";
			echo "<td>". $row["Hinta"] * $amount ."€</td>";
            echo "</tr>"; 
            echo "</table>";
            ?>
        </div>
    </div>
    <button type="submit" class="orderbtn">Tilaa</button>
  </div>
</form>
</body>
</html>