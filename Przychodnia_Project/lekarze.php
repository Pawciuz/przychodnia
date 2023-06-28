<?php
	session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Przychodnia Zdrowie</title>
	<link rel="shortcut Icon" href="logo.png" />
	<link rel="stylesheet" href="strona_glowna.css"> 
</head>
<body background="bg_logowanie.png" link="#000" alink="#017bf5" vlink="#000">
	<h3 align="center">
		<font face="Lato" size="6"><img src="logo.png" width="100px" height="100px"></img></font>
	</h3>
<div id="menu">
<ul>
	<li><a href="strona_glowna.php" id="przycisk"><img src="home.png" width="50px" height="50px"></img></a></li>
	<li><a href="lekarze.php"><img src="lekarze2.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="wizyta.php"><img src="wizyta.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="kontakt.php"><img src="kontakt.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="profil.php"><img src="profil.png" width="50px" height="50px" id="przycisk"></a></li>
</ul>
</div>
<div id="right">
<font face="Lato">
<div id="lekarze"><br>
<b><i>Nasi lekarze:</b></i>
</div>
<?php
$przychodnia = mysqli_connect("localhost","root","","przychodnia"); 
mysqli_set_charset($przychodnia, "UTF8");
	if ($przychodnia) {
		$zapytanie = "SELECT * from lekarze"; //2 - stworzenie zapytania
		$query = mysqli_query($przychodnia, $zapytanie); //3 - wysłanie zapytania do bazy
		echo "<center>";
		echo '<table cellspacing="20px" >';
			echo "<tr>";
				echo"<td>";
					echo "<b>Imię</b>";
				echo"</td>";
				echo"<td>";
					echo "<b>Nazwisko</b>";
				echo"</td>";
				echo"<td>";
					echo "<b>Specjalizacja</b>";
				echo"</td>";
			echo "</tr>";
		while ($row = mysqli_fetch_array($query)){ //4 - obsługa zapytania
			echo "<tr>";
				echo"<td>";
					echo $row['imię'];
				echo"</td>";
				echo"<td>";
					echo $row['nazwisko'];
				echo"</td>";
				echo"<td>";
					echo $row['Specjalizacja'];
				echo"</td>";
				echo"</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</center>";
		mysqli_close($przychodnia); //5 - zamknięcie połączenia
	}
	else {
	echo '<script>alert("Błąd połączenia.")</script>';
	}
?>
</font>
</div>
<div id="stopka">
<font face="Lato">
<p><b>Przychodnia Zdrowie | Designed by <br>Paweł Podgórski</b></p>
</font>
</div>
</font>
</body>
</html>