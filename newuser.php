<?php
	require("functions.php");
	echo "<body style='background-color:#202020'>";
	$email = "";
	$name = "";
	$directoryName = 'img';
	//muutujad võimalike veateadetega
	$nameError = "";
	$emailError = "";
	$passwordError = "";
	$error = "";

	if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
	}
	//kui on uue kasutaja loomise nuppu vajutatud
	if(isset($_POST["submitUserData"])){
	//var_dump($_POST); //Tähtis array $_POST
	if (isset($_POST["firstName"]) and !empty($_POST["firstName"])){
		//$name=$_POST["firstName"];
		$name = test_input($_POST["firstName"]);
	}else{
		$nameError="Palun sisesta eesnimi!";
	}
	if(isset($_POST["email"]) and !empty($_POST["email"])){
		$email = test_input($_POST["email"]);
	}else{
		$emailError = "Sisestage korrektne email!";
	}
	//passwordi kontroll
	if(strlen($_POST["password"]) < 8){
		$passwordError = "Salasõna peab olema vähemalt 8 tähemärgi pikkune";
	}
	//kui kõik on korras, siis salvestame kasutaja
	if(empty($nameError) and empty($emailError) and empty($passwordError)){
		$notice = signup($name ,$email, $_POST["password"]);
		echo $notice;
		echo"<script language='javascript'>
				alert('Kasutaja loodud!');
				window.location.href = 'index.php';
		</script>";
	}else{
		$error = "Kasutaja loomisel tekkis viga!";
	}
	}//kui on nuppu vajutatud lõppeb ära
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="newuser.css">
	<title>Konto loomine</title>
</head>
<body>
	<br>

	<div id="main">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		    <h1>Konto loomine</h1>
			<input name="firstName" type="text" placeholder="Username" value="<?php echo $name; ?>"><br>
			<input type="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>"><br>
			<input type="password" name="password" type="text" placeholder="Salasõna" >
			<br>
			<input name="submitUserData" type="submit" value="Loo kasutaja">
			<br>
			<br>
			<a style="text-align:left;" href="index.php">Tagasi avalehele</a>
		</form>
		<a1><?php echo $error; ?></a1>
	</div>
</body>
</html>
