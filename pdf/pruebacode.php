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

if (isset($_POST["imprimir1"])) {
	$mes = $_POST['mes'];
	$td = $_POST['tipo_direc'];
	$n1 = $_POST['numero_direc'];
	$n2 = $_POST['numero2_direc'];
	$n3 = $_POST['numero3_direc'];
	$dire = $td.$n1.'#'.$n2.'-'.$n3;
	$query = "SELECT * FROM puntos WHERE dir = '$dire' AND id_mes = '$mes";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	if ($fila = mysqli_fetch_array($query_exec)) {
		$doc = $fila[3];
		$id_punto = $fila[0];
		$query2 = "SELECT * FROM facturacion WHERE documento = '$doc'";
	$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
	if ($fila2 = mysqli_fetch_array($query_exec2)) {
		$n_fact = $fila2[0];
		$f_fact = $fila2[3];
		$p_fact = $fila2[4];
		$query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
	$query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta");
	if ($fila3 = mysqli_fetch_array($query_exec3)) {
		$p_nom = $fila3[1];

	?>
	<form method="POST" action="prueba.php">
		<input type="hidden" name="dir" value="<?php echo $dire; ?>">
		<input type="hidden" name="n_fact" value="<?php echo $n_fact; ?>">
		<input type="hidden" name="id_punto" value="<?php echo $id_punto; ?>">
		<input type="hidden" name="p_nom" value="<?php echo $p_nom; ?>">
		<input type="hidden" name="f_fact" value="<?php echo $f_fact; ?>">
		<input type="hidden" name="p_fact" value="<?php echo $p_fact; ?>">
		<input type="hidden" name="doc" value="<?php echo $doc; ?>">
		<img src="barcode.php?filepath=assets/<?php echo $doc; ?>.jpg&codetype=Code39&size=100&text=<?php echo $n_fact; ?>"/>
		<input type="submit" name="fact1">
	</form>
	<?php 
		}}}}
	if (isset($_POST["imprimirt"])) {

		$mes = $_POST['mes'];

		?>
		<form method="POST" action="prueba2.php">
		<input type="hidden" name="mes" value="<?php echo $mes; ?>">
		<?php 
		$query = "SELECT * FROM puntos ";
		$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
		while ($fila = mysqli_fetch_array($query_exec)) {
			$doc = $fila[3];
			$query2 = "SELECT * FROM facturacion ";
		$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
		while ($fila2 = mysqli_fetch_array($query_exec2)) {
			$n_fact = $fila2[0];
			?>
				<img src="barcode.php?filepath=assets/<?php echo $n_fact; ?>.jpg&codetype=Code39&size=100&text=<?php echo $n_fact; ?>"/>			
			<?php 
		}}
		 ?>
		
		<input type="submit" name="fact2">
	</form>
	<?php
	}
		
	 ?>
</body>
</html>