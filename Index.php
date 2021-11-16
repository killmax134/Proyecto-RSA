<?php
	session_start();

	require 'DateBase.php';

	if (isset($_SESSION['datos_id'])) {
		$records = $conn->prepare('SELECT id,email,password,name FROM datos WHERE id = :id');
		$records->bindParam(':id', $_SESSION['datos_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		if (count($results) > 0) {
			$datos = $results;
		}
			}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Antique&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assents/CSS/declaracion.css">
</head>
<body>
	<center>
	<?php require 'partials/Header.php'?>

	<?php if (!empty($datos)): ?>
	<br> Bienvenido. <?= $datos['email'] ?>
	<br>Ya estas Logeado
	<a href="Login.php">Ingresar</a>
	<?php else: ?>
</center>
	<h1>Porfavor Ingresa o Registrate</h1>

	<center>
	<a href="Login.php" ><h5>Ingresar</a> o
	<a href="registrar.php">Registrate</h5></a>
</center>
 
<?php endif; ?>
</body>
</html>