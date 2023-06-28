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
	<li><a href="wizyta.php"><img src="wizyta2.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="kontakt.php"><img src="kontakt.png" width="50px" height="50px" id="przycisk"></a></li>
	<li><a href="profil.php"><img src="profil.png" width="50px" height="50px" id="przycisk"></a></li>
</ul>
</div>
<div id="right">
<form method="post">
<font face="Lato">
<div id="wizyta">
<center>
<table>
<tr>
<?php
	echo"<td><p style=' text-align:right; font-size:40px;'>Specjalizacja:</p></td><td><center><select name='spec'>";

$przychodnia = mysqli_connect("localhost","root","","przychodnia"); //1 - połączenie z bazą
mysqli_set_charset($przychodnia, "UTF8");
		$zapytanie = "SELECT DISTINCT Specjalizacja from lekarze"; //2 - stworzenie zapytania
		$query = mysqli_query($przychodnia, $zapytanie); //3 - wysłanie zapytania do bazy
		while ($row = mysqli_fetch_array($query)){ //4 - obsługa zapytania
			$spec=$row['Specjalizacja'];
			echo"<option name=spec value='$spec'>$spec</option>";
		}
mysqli_close($przychodnia);
echo"</select></center></td>&nbsp;<td><input type='submit' value='Pokaż lekarzy' name='pokaz'></td>";
echo"</tr>";
echo"<tr>";
	if (isset($_POST['pokaz'])){
	echo "<td colspan='3'><center><select name='lekarz'>";
	$specjalizacja=$_POST['spec'];
	$przychodnia = mysqli_connect("localhost","root","","przychodnia"); //1 - połączenie z bazą
	mysqli_set_charset($przychodnia, "UTF8");
			$zapytanie = "SELECT * from lekarze WHERE Specjalizacja='$specjalizacja'"; //2 - stworzenie zapytania
			$query = mysqli_query($przychodnia, $zapytanie); //3 - wysłanie zapytania do bazy
			while ($row = mysqli_fetch_array($query)){ //4 - obsługa zapytania
				$id=$row['id_lekarza'];
				$imie=$row['imię'];
				$nazwisko=$row['nazwisko'];
				echo"<option value='$id'>$specjalizacja - $imie $nazwisko</option>";
			}
		echo "</select></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><label><p style=' text-align:right; font-size:40px;'>Data wizyty:</p></td><td><input type='date' name='data'></td><td></td>";
		echo "</tr>";
		echo "<tr>";
		$time=7.30;
		echo "<td><p style=' text-align:right; font-size:40px;'>Godzina wizyty:</p></td><td><select name='godzina'>";
		while($time<20.30){
			$timetext="$time".'0';
			echo"<option value='$timetext'>$timetext</option>";
			$time=$time+1.0;
		}
		echo"</select></center></td><td></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan='3'><center><input type='submit' value='Umów wizytę' name='umow'></center></td>";
		echo "</tr>";
		mysqli_close($przychodnia);
	}
	?>
</table>
<?php
	error_reporting(0);
	if (isset($_POST['umow'])){
		$przychodnia = mysqli_connect("localhost","root","","przychodnia"); //1 - połączenie z bazą
		mysqli_set_charset($przychodnia, "UTF8");
		$id_lekarza=0;
		$id_pacjenta=$_SESSION['user_id'];
		$id_lekarza=$_POST['lekarz'];
		$data_wizyty=$_POST['data'];
		$godzina=$_POST['godzina'];
			$zapytanie3 = "SELECT * from wizyty where id_lekarza=$id_lekarza and Data_wizyty='$data_wizyty' and Godzina='$godzina';"; //2 - stworzenie zapytania
			$query3 = mysqli_query($przychodnia, $zapytanie3);
			$row = mysqli_fetch_array($query3);
			$id_lekarza2=$row['id_lekarza'];
			$data_wizyty2=$row['Data_wizyty'];
			$raz=$raz-1;
			$godzina2=$row['Godzina'];
			if ($data_wizyty==00-00-0000){
				echo '<script>alert("Pole data wizyty nie może być puste.")</script>';
			}else{
				if($id_lekarza == $id_lekarza2 && $data_wizyty == $data_wizyty2 && $godzina2 == $godzina2){
					 echo '<script>alert("Nie można dodać takiej wizyty, ponieważ ktoś inny jest już zapisany na tą godzinę do tego lekarza.")</script>';
				}else{
					$zapytanie4 = "INSERT INTO wizyty (id_wizyty, id_pacjenta ,id_lekarza, Data_wizyty, Godzina)VALUES(NULL,$id_pacjenta,$id_lekarza,'$data_wizyty','$godzina')"; //2 - stworzenie zapytania
					$query4 = mysqli_query($przychodnia, $zapytanie4); //3 - wysłanie zapytania do bazy
					if($query4){
						echo '<script>alert("Dodano wizytę.")</script>';
					}else{
						echo $zapytanie3;
					}
				}
			}
			mysqli_close($przychodnia);
	}
	?>
</center>
</div>
</form>
</div>
<div id="stopka">
<p><b>Przychodnia Zdrowie | Designed by <br>Paweł Podgórski</b></p>
</div>
</font>
</body>
</html>