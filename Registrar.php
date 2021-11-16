<?php require 'DateBase.php';
	$message = "";
	if (!empty($_POST['email'])>=1 && !empty($_POST['password'])>=1 && !empty($_POST['name'])>=1 && !empty($_POST['DNI'])>=1 && !empty($_POST['Course'])>=1 && !empty($_POST['lastname']) >=1 && !empty($_POST['level']) >=1) {

		$email = trim($_POST['email']);
	 	$password = trim($_POST['password']);
	 	$name = trim($_POST['name']);
	 	$DNI = trim($_POST['DNI']);
	 	$Course = trim($_POST['Course']);
	 	$lastname = trim($_POST['lastname']);
	 	$level = trim($_POST['level']);
	 
	 	
	 	$sql = "INSERT INTO datos (email, password, name, lastname, DNI, Course, level) VALUES (:email, :password, :name, :lastname. :DNI, :Course, :level)";
	 	$stmt = $conn->prepare($sql);
	 	$stmt->bindParam(':email', $_POST['email']);
	 	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	 	$stmt->bindParam(':password', $password);
	 	$stmt->bindParam(':name', $name);
	 	$stmt->bindParam(':lastname', $lastname);
	 	$stmt->bindParam(':level', $level);
	 	$stmt->bindParam(':DNI', $DNI);
	 	$stmt->bindParam(':Course', $Course);
	 	
	 	if ($stmt->execute()) {
	 		$message = 'Ha sido creado correctamente';
	 	}else{
	 		$message = 'Ha ocurrido un error';
	 	}
	 } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registar</title>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Antique&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="assents/CSS/declaracion.css">
</head>
<body>
	<?php require 'partials/Header.php'?>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	
	<section class="sec-form">
		<form action="registrar.php" method="post" class="decla">
	<h1>Registrate <spam>o <a href="Login.php">Ingresa</a> </spam></h1>
		<br><br>
		<center>
		<input class="formulario" type="text" name="name" placeholder="Ingrese su Nombre">
		<br>
		<input class="formulario" type="text" name="lastname" placeholder="Ingrese su Apellido">
		<br>
		<input class="formulario" type="text" name="DNI" placeholder="Ingrese su DNI">
		<br>
		<input class="formulario" type="text" name="email" placeholder="Ingrese su Email">
		<br>
		<input class="formulario" type="password" name="password" placeholder="Ingrese su Contraseña">
		<h3>Curso: <select name="Course">
<option value="11"> Visitante</option>
<option value="10"> Profesor </option>      <option value="11"> 1° 1° </option>
<option value="12"> 1° 2° </option>
<option value="13"> 1° 3° </option>
<option value="14"> 1° 4° </option>
<option value="15"> 1° 5° </option>
<option value="16"> 1° 6° </option>
<option value="17"> 1° 7° </option>
<option value="18"> 1° 8° </option>
<option value="19"> 1° 9° </option>
<option value="20"> 2° 1° </option>
<option value="21"> 2° 2° </option>
<option value="22"> 2° 3° </option>
<option value="23"> 2° 4° </option>
<option value="31"> 3° 1° </option>
<option value="32"> 3° 2° </option>
<option value="33"> 3° 3° </option>
<option value="41a"> 4° 1° T.E.C.I.P</option>
<option value="42a"> 4° 2° T.E.C.I.P</option>
<option value="51a"> 5° 1° T.E.C.I.P</option>
<option value="52a"> 5° 2° T.E.C.I.P</option>
<option value="61a"> 6° 1° T.E.C.I.P</option>
<option value="62a"> 6° 2° T.E.C.I.P</option>
<option value="71a"> 7° 1° T.E.C.I.P</option>
<option value="72a"> 7° 2° T.E.C.I.P</option>
<option value="41b"> 4° 1° T.E.C.T.A</option>
<option value="42b"> 4° 2° T.E.C.T.A</option>
<option value="51b"> 5° 1° T.E.C.T.A</option>
<option value="52b"> 5° 2° T.E.C.T.A</option>
<option value="61b"> 6° 1° T.E.C.T.A</option>
<option value="62b"> 6° 2° T.E.C.T.A</option>
<option value="71b"> 7° 1° T.E.C.T.A</option>
<option value="72b"> 7° 2° T.E.C.T.A</option>
<option value="41c"> 4° 1° T.E.C.S.T</option>
<option value="42c"> 4° 2° T.E.C.S.T</option>
<option value="51c"> 5° 1° T.E.C.S.T</option>
<option value="52c"> 5° 2° T.E.C.S.T</option>
<option value="61c"> 6° 1° T.E.C.S.T</option>
<option value="62c"> 6° 2° T.E.C.S.T</option>
<option value="71c"> 7° 1° T.E.C.S.T</option>
<option value="72c"> 7° 2° T.E.C.S.T</option>
</select>
<br></h3>
		<h3>Nivel: <select name="Level">
            <option value="1"> alumno </option>
            <option value="2"> profesor </option>
            <option value="3"> Visitante</option>
             </select></h3>
		

		<br><br>
		<input type="submit" value="Enviar">
		</center>
	</form>
</section>
</body>
</html>