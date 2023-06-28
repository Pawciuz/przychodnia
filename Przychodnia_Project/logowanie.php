<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<link rel="shortcut Icon" href="logo.png" />
	<link rel="stylesheet" href="style.css">
	<title>
		Logowanie
	</title>
</head>
<body background="bg_logowanie.png" link="#000" alink="#017bf5" vlink="#000">
	<h3 align="center">
		<font face="Lato" size="6"><img src="logo.png" width="100px" height="100px"></img></font>
	</h3>
	<br /><br /><br /><br />
	<h1 align="center">
		<font face="Lato" color="#017bf5" size="7">
			ZALOGUJ SIĘ
		</font>
	</h1>
	<h3 align="center">
		<font face="Lato" color="#80bffe" size="5">
			<form method="POST">
				Login <input type="text" name="login"/>
				<br /><br>
				Hasło <input type="password" name="haslo" />
				<br /><br>
				<center><input type="submit" value="zaloguj" name="zaloguj" class="newbutton button"><br></center>
			</form>
			<font face="Lato" color="#71b8fe" size="3">
			<a href="przychodnia.php">Nie masz konta? Zarejestruj się!</a>
			</font>
		</div>
		<br>
			<?php
			if(isset($_POST['zaloguj'])){
				error_reporting(0);
				$db = mysqli_connect("localhost", "root", "", "przychodnia");
				$login = mysqli_real_escape_string($db, $_POST['login']);
				$haslo = mysqli_real_escape_string($db, $_POST['haslo']);
				$haslo_hash = hash('sha256',$haslo);
								
				$sql = "select * from logowania where login = '$login' and haslo = '$haslo_hash'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_array($result);
				$idlog= $row['id_logowanie'];
				$zapytanie = "select id_pacjenta from pacjenci where id_logowania = '$idlog' ";
				$count = mysqli_num_rows($result);
				$result2 = mysqli_query($db, $zapytanie);
				$row2 = mysqli_fetch_array($result2);
				$idpacjenta= $row2['id_pacjenta'];
				if($count == 1){
					$_SESSION['zalogowany'] = $login;
					$_SESSION['user_id'] = $idpacjenta;
					header("Location: strona_glowna.php");
				}else{
					echo '<script>alert("Błędne dane logowania.")</script>';
					header("Refresh:0");
				}
			}
			?>
		</font>
	</h3>
	<br />
	<h3 align="center">
	</h3>
</body>
</html>