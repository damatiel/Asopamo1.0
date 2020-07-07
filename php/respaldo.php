<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="backup.php">
		<label>Crear respaldo de la base de datos</label>
		<button type="submit" name="backup">Crear</button>
	</form>
	<br>
	<br>
	<form method="post" action="restore.php">
		<label>Subir respaldo de la base de datos</label>
		<input type="file" name="sql">
		<button type="submit" name="backup">Subir</button>
	</form>
	<br>
	<br>
	<form method="post" action="pagos.php">
		<button type="submit" name="backup">Volver</button>
	</form>


</body>
</html>