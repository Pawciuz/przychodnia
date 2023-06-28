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
	<li><a href="lekarze.php"><img src="lekarze.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="wizyta.php"><img src="wizyta.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="kontakt.php"><img src="kontakt.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="profil.php"><img src="profil2.png" width="50px" height="50px" id="przycisk"></a></li>
</ul>
</div>
<div id="right">
<font face="Lato">
<table>
	<tr>
		<td>
		<div id="profil1">
		<p style="color:white; text-align:center; font-size:30px;"> Umówione wizyty:<br></p>
		<p style="color:black; text-align:center; font-size:15px;"> Aby anulować wizytę należy skontaktować się z nami przez <a href="kontakt.php">e-mail</a>:<br></p>
		<center><table border="1px">
		<?php
		$id_pacjenta=$_SESSION['user_id'];
		$przychodnia = mysqli_connect("localhost","root","","przychodnia"); //1 - połączenie z bazą
		mysqli_set_charset($przychodnia, "UTF8");
		$zapytanie1 = "SELECT * from wizyty where id_pacjenta=$id_pacjenta"; //2 - stworzenie zapytania
		$query = mysqli_query($przychodnia, $zapytanie1); //3 - wysłanie zapytania do bazy
		echo"<tr>";
			echo"<td>";
			echo"<b>Imię i nazwisko lekarza</b>";
			echo"</td>";
			echo"<td>";
			echo"<b>Data wizyty</b>";
			echo"</td>";
			echo"<td>";
			echo"<b>Godzina</b>";
			echo"</td>";
		echo"</tr>";
		while ($row = mysqli_fetch_array($query)){//4 - obsługa zapytania
		$id_lekarza=$row['id_lekarza'];
		$data=$row['Data_wizyty'];
		$godzina=$row['Godzina'];
		$zapytanie2 = "SELECT imię, nazwisko from lekarze where id_lekarza=$id_lekarza"; //2 - stworzenie zapytania
		$query2 = mysqli_query($przychodnia, $zapytanie2); //3 - wysłanie zapytania do bazy
		$row2 = mysqli_fetch_array($query2);//4 - obsługa zapytania
		$imię=$row2['imię'];
		$nazwisko=$row2['nazwisko'];
			echo"<tr>";
				echo"<td>";
					echo"$imię $nazwisko";
				echo"</td>";
				echo"<td>";
					echo"$data";
				echo"</td>";
				echo"<td>";
					echo"$godzina";
				echo"</td>";
			echo"</tr>";
		}
		mysqli_close($przychodnia);
		?>
		</table></center>
		</div>
		</td>
		<td>
		<div id="profil2">
		<br><p style="color:white; text-align:center; font-size:30px;"> Informacje o użytkowniku:<br><br><br></p>
		<center><table border="1px">
		<?php
		$id_pacjenta=$_SESSION['user_id'];
		$przychodnia = mysqli_connect("localhost","root","","przychodnia"); //1 - połączenie z bazą
		mysqli_set_charset($przychodnia, "UTF8");
		$zapytanie = "SELECT * from pacjenci where id_pacjenta=$id_pacjenta"; //2 - stworzenie zapytania
		$query = mysqli_query($przychodnia, $zapytanie); //3 - wysłanie zapytania do bazy
		$row = mysqli_fetch_array($query);//4 - obsługa zapytania
		$imie = $row['Imię'];
		$nazwisko = $row['Nazwisko'];
		$płeć = $row['Płeć'];
		$pesel = $row['PESEL'];
		$email = $row['email'];
		$data_urodzenia = $row['Data_urodzenia'];
		$ulica = $row['Ulica'];
		$nr_domu = $row['Nr_domu'];
		$nr_lokalu =$row['Nr_lokalu'];
		$kod_pocztowy = $row['Kod_pocztowy'];
		$miasto = $row['Miasto'];
		echo"<tr>";
			echo"<td>";
			echo"<b>Imię: </b>";
			echo"</td>";
			echo"<td>";
			echo"$imie";
			echo"</td>";
			echo"<td>";
			echo"<b>Nazwisko: </b>";
			echo"</td>";
			echo"<td>";
			echo"$nazwisko";
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
			echo"<b>Płeć: </b>";
			echo"</td>";
			echo"<td>";
			echo"$płeć";
			echo"</td>";
			echo"<td>";
			echo"<b>PESEL: </b>";
			echo"</td>";
			echo"<td>";
			echo"$pesel";
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
			echo"<b>E-mail: </b>";
			echo"</td>";
			echo"<td>";
			echo"$email";
			echo"</td>";
			echo"<td>";
			echo"<b>Data urodzenia: </b>";
			echo"</td>";
			echo"<td>";
			echo"$data_urodzenia";
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
			echo"<b>Ulica: </b>";
			echo"</td>";
			echo"<td>";
			echo"$ulica";
			echo"</td>";
			echo"<td>";
			echo"<b>Nr domu: </b>";
			echo"</td>";
			echo"<td>";
			echo"$nr_domu";
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
			echo"<b>Nr lokalu: </b>";
			echo"</td>";
			echo"<td>";
			echo"$nr_lokalu";
			echo"</td>";
			echo"<td>";
			echo"<b>Kod pocztowy: </b>";
			echo"</td>";
			echo"<td>";
			echo"$kod_pocztowy";
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
			echo"<b>Miasto: </b>";
			echo"</td>";
			echo"<td colspan='3'>";
			echo"$miasto";
			echo"</td>";
		echo"</tr>";
		?>
		</table></center>
		</div>
		</td>
	</tr>
</table>
<a href="wyloguj.php"><img src="przycisk_wyloguj.png"/></a>
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