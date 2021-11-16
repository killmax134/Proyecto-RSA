<?php 
	
	session_start();

	

	require 'DateBase.php';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$records = $conn->prepare('SELECT id,email,password FROM datos WHERE email=:email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);
		$message = '';

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
			$_SESSION['datos_id'] = $results['id'];
			header('location: /php-login');
		}else{
			$message = 'Lo siento, estos datos no son correctos';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ingresar</title>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Antique&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assents/CSS/declaracion.css">
</head>
<body>
	<?php require 'partials/Header.php'?>
	<?php if (!empty($message)) : ?>
		<p><?= $message ?></p>
	<?php endif; ?>
<section class="sec-form">
	<form action="Login.php" method="post" class="decla">
	<h1>Ingresar
	<spam>o <a href="registrar.php">Registrate</a> </spam></h1>

	<br><br>
	<center>
		<input class="formulario" type="text" name="email" placeholder="Ingrese su Email">
		<br>
		<input class="formulario" type="password" name="password" placeholder="Ingrese su Contraseña">
		<br><br>
		<input  type="submit" value="Enviar">
	</center>
	</form>
</section>
</body>
</html>