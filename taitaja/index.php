<html lang="fi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
	<link href="./css/index.css" rel="stylesheet">
	<title>Mustat Renkaat</title>
</head>
<body>
	<header>
		<div id="logo-img">
			<img src="./img/logo/logo_light.svg" alt="">
		</div>
		<span id="divider"> </span>
		<div id="nav-btns">
			<ul>
  				<li><a class="nav-active" href="#Haku">Haku</a></li>
  				<li><a href="#video">Video</a></li>
  				<li><a href="#loc">Sijainti</a></li>
			</ul>
		</div>
		<script type="text/javascript">
			var viewportwidth;
			var viewportheight;

			if (typeof window.innerWidth != 'undefined')
			{
				viewportwidth = window.innerWidth,
				viewportheight = window.innerHeight
			}
			else if (typeof document.documentElement != 'undefined'
				&& typeof document.documentElement.clientWidth !=
				'undefined' && document.documentElement.clientWidth != 0)
			{
				viewportwidth = document.documentElement.clientWidth,
				viewportheight = document.documentElement.clientHeight
			}
			else
			{
				viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
				viewportheight = document.getElementsByTagName('body')[0].clientHeight
			}
			if(viewportwidth < 451)
			{
				var x = document.getElementById("nav-btns");
  				if (x.style.display != "block") {
					x.style.display = "none";
  				} else {
					x.style.display = "block";
  				}
			}
		</script>
	</header>
	<div class="main-body">
		<form method="post" action="">
			<div class="search">
		    	<select name="merkki" id="Haku">
		    	    <option value="Kaikki">Merkki</option>
		    	    <option value="Nokian">Nokian</option>
		    	    <option value="Hankook">Hankook</option>
		    	    <option value="Kumho">Kumho</option>
		    	</select>
				<select name="tyyppi" id="">
		    	    <option value="Kaikki">Tyyppi</option>
		    	    <option value="Nasta">Nasta</option>
		    	    <option value="Kitka">Kitka</option>
		    	    <option value="Kesä">Kesä</option>
		    	</select>
				<select name="koko" id="">
		    	    <option value="Kaikki">Koko</option>
					<option value="165/55-14">165/55-14</option><option value="165/55-15">165/55-15</option><option value="165/65-14">165/65-14</option><option value="175/65-14">175/65-14</option><option value="175/65-15">175/65-15</option><option value="185/55-15">185/55-15</option><option value="185/65-14">185/65-14</option><option value="185/65-15">185/65-15</option><option value="195/55-15">195/55-15</option><option value="195/65-15">195/65-15</option><option value="205/55-16">205/55-16</option><option value="205/65-16">205/65-16</option><option value="225/55-18">225/55-18</option><option value="235/60-17">235/60-17</option><option value="235/60-18">235/60-18</option><option value="235/65-17">235/65-17</option><option value="255/50-19">255/50-19</option>
		    	</select>
		    	<input type="submit" value="Hae">
			</div>
		</form>
		<?php
		    require("./php/yhteys.php");
			header('Content-Type: text/html; charset=utf-8');

			$tire_query = "SELECT * FROM renkaat";

			$data = array();
			$kaikki = 1;

		    if( isset($_POST["merkki"]) && ($_POST["merkki"] != "Kaikki") )
		    {
				$kaikki = 0;
		        $tire_query .= " WHERE Merkki=?";
				$data = array($_POST["merkki"]);
			}

			if( isset($_POST["tyyppi"]) && ($_POST["tyyppi"] != "Kaikki") )
			{
				$temp_query = " AND Tyyppi=?";

				if($kaikki) 
					$temp_query = " WHERE Tyyppi=?";

				$kaikki = 0;
				$tire_query .= $temp_query;
				array_push($data, $_POST["tyyppi"]);
			}
			if( isset($_POST["koko"]) && ($_POST["koko"] != "Kaikki") )
			{
				$temp_query = " AND Koko=?";
				if($kaikki)
					$temp_query = " WHERE Koko=?";

				$tire_query .= $temp_query;
				array_push($data, $_POST["koko"]);
			}

			$stmt = $pdo->prepare($tire_query);
		    $stmt->execute($data);
		    $rows = $stmt->fetchAll();

		    echo "<table id='my-table2'>";
			echo "<tr>
			<th></th>
		    <th onclick='sortTable(1)'>Merkki</th>
		    <th>Malli</th>
		    <th>Tyyppi</th>
		    <th>Koko</th>
		    <th onclick='sortTable(5)'>Hinta</th>
			<th></th>
			</tr>
			<hr>";
		    foreach($rows as $row) {
				$id = $row["RengasID"];
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
				echo "<tr class='rengas-rivi' id='rengas_$id'>";
				if($id == 28)
					echo "<td><img src='./img/nokian.jpg' alt=''></td>";
				else
		        	echo "<td><img src='./img/$kuvanimi' alt=''></td>";
		        echo "<td>". $row["Merkki"] ."</td>";
		        echo "<td>". $row["Malli"] ."</td>";
		        echo "<td>". $row["Tyyppi"] ."</td>";
		        echo "<td>". $row["Koko"] ."</td>";
				echo "<td>". $row["Hinta"] ."€</td>";
				echo "<td class='tilaa'><form method='GET' action='php/tilaa.php'><input type='hidden' name='id' value='$id'><select name='amount' class='amount'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option></select><input type='submit' value='Tilaa'></form></td>";
				echo "</tr>";
		    }
		    echo "</table>";
		?>

		<?php
		if(isset($_GET["failed"]))
		{
			echo '
			<div id="myModal" class="modal">
			  <div class="modal-content">
				<div class="modal-header">
				  <span class="close">&times;</span>
				  <h1>Virhe</h1>
				</div>
				<div class="modal-body">
				  <p>Renkaita ei ole tarpeeksi varastossa!</p>
				</div>
			  </div>
			</div>
			
			<script>
			var modal = document.getElementById("myModal");
			var span = document.getElementsByClassName("close")[0];
			
			span.onclick = function() {
			  modal.style.display = "none";
			}
			
			window.onclick = function(event) {
			  if (event.target == modal) {
				modal.style.display = "none";
			  }
			}
			</script>';
		}
		?>

		<script>
		function sortTable(n)
		{
			var x_data, table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
			table = document.getElementById("my-table2");
			switching = true;

	    	dir = "asc";
			
			while (switching) {
				switching = false;
				rows = table.rows;

				for (i = 1; i < (rows.length - 1); i++) {
					shouldSwitch = false;

					x = rows[i].getElementsByTagName("TD")[n];
	    	        y = rows[i + 1].getElementsByTagName("TD")[n];
				
	    	        x_data = x.innerHTML;
	    	        y_data = y.innerHTML;
				
					if (dir == "asc") 
					{
	    	            if(n == 4) {
	    	                if (Number(x_data) > Number(y_data)) {
	    	                    shouldSwitch = true;
	    	                    break;
	    	                }
	    	            } else {
						    if (x_data.toLowerCase() > y_data.toLowerCase()) 
						    {
						    	shouldSwitch = true;
						    	break;
	    	                }
	    	            }
					} else if (dir == "desc") 
					{
	    	            if(n == 4) {
	    	                if (Number(x_data) < Number(y_data)) {
	    	                    shouldSwitch = true;
	    	                    break;
	    	                }
	    	            } else {
						    if (x_data.toLowerCase() < y_data.toLowerCase()) 
						    {
						    	shouldSwitch = true;
						    	break;
	    	                }
	    	            }
					}
				}
				if (shouldSwitch) 
				{
					rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					switching = true;
					// Each time a switch is done, increase this count by 1:
					switchcount++;
				} else 
				{
					if (switchcount == 0 && dir == "asc") 
					{
						dir = "desc";
						switching = true;
					}
				}
			}
		}
		</script>
		<div id="ads">
			<img id="ad1" src="./img/ads/ad1.jpg" alt="">
			<img id="ad2" src="./img/ads/ad2.png" alt="">
		</div>
		<div id="video">
			<div>
				<h1>Renkaiden vaihto</h1>
				<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/raZ9cPz2z2M" frameborder="0" allow="clipboard-write; encrypted-media; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div id="loc">
			<div>
				<h1>Sijainti</h1>
				<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=24.816613197326664%2C64.26456889493905%2C24.82109248638153%2C64.26562987859354&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=19/64.26510/24.81885">Näytä isommalla kartalla</a></small>
				<div id="img-container">
				<img src="./img/kartta.jpg" alt="Sijainti">
				</div>
			</div>
		</div>
		<div id="contact">
			<span>
				Mustapään Auto Oy<br>
				Mustat Renkaat<br>
				Kosteenkatu 1, 86300 Oulainen<br>
				Puh. 040-7128158<br>
				email. myyntimies@mustatrenkaat.net<br>
			</span>
		</div>
	</div>
</body>
</html>