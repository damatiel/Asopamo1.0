<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
  require_once __DIR__ . '/../php/conectar.php';

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
	$query = "SELECT * FROM suscriptores WHERE doc = '$documento'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	if ($fila = mysqli_fetch_array($query_exec)) {
	?>
	<form method="POST" action="prueba.php">
		<input type="hidden" name="td" value="<?php echo $dire; ?>">
		<img src="barcode.php?filepath=assets/123456.jpg&codetype=Code39&size=100&text=hola"/>
	</form>
	<?php 
		}}
	 ?>




	
<a href="prueba.php">generar pdf</a>
</body>
</html>


<?php 
echo '';
 ?>