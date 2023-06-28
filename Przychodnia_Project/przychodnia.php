<!doctype html>
<html lang="pl">
<head>
<title>Rejestracja</title>
<meta charset="UTF-8" />
<link rel="shortcut Icon" href="logo.png" />
<link rel="stylesheet" href="style.css">  
</head>
<body background="bg_logowanie.png">
<h3 align="center">
		<font face="Lato" size="6"><img src="logo.png" width="100px" height="100px"></img></font>
	</h3>
	<h1 align="center">
		<font face="Lato" color="#017bf5" size="7">
			REJESTRACJA
		</font>
	</h1>
	<h3 align="center">
		<font face="Lato" color="#3483d1" size="5">
<form method="post">
<label>Login: <input type="text" name="login"></label><br><br>
<label>Hasło: <input type="password" name="haslo"></label><br><br>
<label>Powtórz hasło: <input type="password" name="haslo2"></label><br><br>
<label>Imię: <input type="text" name="imie"></label><br><br>
<label>Nazwisko: <input type="text" name="nazwisko"></label><br><br>
<label>Płeć: <select name="plec"><br><br>
<option value="k">Kobieta</option><br>
<option value="m">Mężczyzna</option><br>
</select></label><br><br>
<label>PESEL: <input type="text" name="PESEL"></label><br><br>
<label>E-mail: <input type="text" name="email"></label><br><br>
<label>Data urodzenia: <input type="date" name="data"></label><br><br>
<label>Ulica: <input type="text" name="ulica"></label><br><br>
<label>Nr domu: <input type="text" name="nr_domu"></label><br><br>
<label>Nr lokalu: <input type="text" name="nr_lokalu"></label><br><br>
<label>Kod pocztowy: <input type="text" name="kod_pocztowy"></label><br><br>
<label>Miasto: <input type="text" name="miasto"></label><br>
<br>
<center><input type="submit" value="Zarejestruj" name="add" class="newbutton button"><br></center>
</form>
<font face="Lato" color="#71b8fe" size="3">
<a href="logowanie.php">Masz już konto? Zaloguj się!</a>
		</font>
	</font>
<?php
if (isset($_POST['add'])){
	$login=$_POST['login'];
	$haslo=$_POST['haslo'];
	$haslo2=$_POST['haslo2'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$plec = $_POST['plec'];
	$PESEL = $_POST['PESEL'];
	$email = $_POST['email'];
	$data_urodzenia = $_POST['data'];
	$ulica = $_POST['ulica'];
	$nr_domu = $_POST['nr_domu'];
	$nr_lokalu = $_POST['nr_lokalu'];
	$kod_pocztowy = $_POST['kod_pocztowy'];
	$miasto = $_POST['miasto'];
	$przychodnia= mysqli_connect("localhost", "root", "", "przychodnia");
	mysqli_set_charset($przychodnia, "UTF8");
		if ($przychodnia){ //1* - sprawdzenie połączenia
			if ($haslo==""){
				echo '<script>alert("Hasła się nie zgadzają.")</script>';
				header("Refresh:0");
			}
			else if($haslo==$haslo2){
				$zapytanie = "INSERT INTO logowania VALUES (null, '$login', sha2('$haslo', 256));";
				$query = mysqli_query($przychodnia, $zapytanie);
				$zapytanie1= "SELECT * FROM logowania where login ='$login';";
				$query1 = mysqli_query($przychodnia, $zapytanie1);
				$row = mysqli_fetch_array($query1);
				$id= $row["id_logowanie"];
				$zapytanie2 = "INSERT INTO pacjenci (id_pacjenta, Imię , Nazwisko, Płeć, PESEL, email, Data_urodzenia, Ulica, Nr_domu, Nr_lokalu, Kod_pocztowy, Miasto, id_logowania)VALUES(NULL,'$imie','$nazwisko','$plec',$PESEL,'$email', '$data_urodzenia', '$ulica', '$nr_domu', '$nr_lokalu', '$kod_pocztowy', '$miasto', $id)"; //2 - stworzenie zapytania
				$query2 = mysqli_query($przychodnia, $zapytanie2);	
				mysqli_close($przychodnia); //5 - zamknięcie połączenia
				header("Location:logowanie.php");
				echo '<script>alert("Zarejestrowano.")</script>'; 
			}else{
				echo '<script>alert("Hasła się nie zgadzają.")</script>';
				header("Refresh:0");					
			}
		}
}
?>

</body>
</html>