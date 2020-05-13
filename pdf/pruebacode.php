<?php  
  require_once __DIR__ . '..php/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.html"); 
}
if (isset($_POST["imprimir1"])) {
	$td = $_POST['tipo_direc'];
	$n1 = $_POST['numero_direc'];
	$n2 = $_POST['numero2_direc'];
	$n3 = $_POST['numero3_direc'];
	$dire = $td.$n1.'#'.$n2.'-'.$n3;
	

	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<img src="barcode.php?filepath=assets/1234567.jpg&codetype=Code39&size=100&text=jorgeesgay" />
<a href="prueba.php">generar pdf</a>
</body>
</html>


<?php 
echo '';
 ?>