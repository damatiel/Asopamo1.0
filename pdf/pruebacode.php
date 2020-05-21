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
$user = $_SESSION['nombres'];
if (isset($_POST["imprimir1"])) {
	$mes = $_POST['mes'];
	$td = $_POST['tipo_direc'];
	$n1 = $_POST['numero_direc'];
	$n2 = $_POST['numero2_direc'];
	$n3 = $_POST['numero3_direc'];
	$dire = $td.$n1.'#'.$n2.'-'.$n3;
	if ($mes == 1) {
		$mes1 = 'enero';
	}if ($mes == 2) {
		$mes1 = 'febrero';
	}if ($mes == 3) {
		$mes1 = 'marzo';
	}if ($mes == 4) {
		$mes1 = 'abril';
	}if ($mes == 5) {
		$mes1 = 'mayo';
	}if ($mes == 6) {
		$mes1 = 'junio';
	}if ($mes == 7) {
		$mes1 = 'julio';
	}if ($mes == 8) {
		$mes1 = 'agosto';
	}if ($mes == 9) {
		$mes1 = 'septiembre';
	}if ($mes == 10) {
		$mes1 = 'octubre';
	}if ($mes == 11) {
		$mes1 = 'noviembre';
	}if ($mes == 12) {
		$mes1 = 'diciembre';
	}

	$query = "SELECT * FROM puntos WHERE dir = '$dire'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	if ($fila = mysqli_fetch_array($query_exec)) {
		$doc = $fila[3];
		$id_punto = $fila[0];
		$saldo_ant = $fila[4];
		$descuento = $fila[6];
		$atrasos = $fila[5];
		$total_pagar = 13000+$saldo_ant-$descuento;

		$query4 = "INSERT INTO facturacion (id_punto,documento,fecha_fact,periodo_fact,admin_mes,saldo_ant,id_mes,operador,total_pagar) VALUES ('$id_punto', '$doc', NOW(), '$mes1', 13000, '$saldo_ant','$mes', '$user','$total_pagar')";
	$query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta");

		$query2 = "SELECT * FROM facturacion WHERE id_punto = '$id_punto' AND id_mes = '$mes'";
	$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
	if ($fila2 = mysqli_fetch_array($query_exec2)) {
		$n_fact = $fila2[0];
		$f_fact = $fila2[3];
		$p_fact = $fila2[4];
		$admin_mes = $fila2[5];
		$saldo_ant = $fila2[6];
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
		<input type="hidden" name="atrasos" value="<?php echo $atrasos; ?>">
		<input type="hidden" name="admin_mes" value="<?php echo $admin_mes; ?>">
		<input type="hidden" name="saldo_ant" value="<?php echo $saldo_ant; ?>">
		<input type="hidden" name="descuento" value="<?php echo $descuento; ?>">
		<input type="hidden" name="total_pagar" value="<?php echo $total_pagar; ?>">
		<input type="hidden" name="user" value="<?php echo $user; ?>">
		<img style="display: none;" src="barcode.php?filepath=assets/<?php echo $doc; ?>.jpg&codetype=Code39&size=100&text=<?php echo $n_fact; ?>"/>
		<input type="submit" name="fact1">
	</form>
	<?php 
		}}}else{
			echo "
				<script>
				alert('Se agregaron datos incorrectos');
				redir('../php/facturacion.php');
				</script>
				";
		}}
	if (isset($_POST["imprimirt"])) {

		$mes = $_POST['mes'];
		if ($mes == 1) {
    $mes1 = 'enero';
  }if ($mes == 2) {
    $mes1 = 'febrero';
  }if ($mes == 3) {
    $mes1 = 'marzo';
  }if ($mes == 4) {
    $mes1 = 'abril';
  }if ($mes == 5) {
    $mes1 = 'mayo';
  }if ($mes == 6) {
    $mes1 = 'junio';
  }if ($mes == 7) {
    $mes1 = 'julio';
  }if ($mes == 8) {
    $mes1 = 'agosto';
  }if ($mes == 9) {
    $mes1 = 'septiembre';
  }if ($mes == 10) {
    $mes1 = 'octubre';
  }if ($mes == 11) {
    $mes1 = 'noviembre';
  }if ($mes == 12) {
    $mes1 = 'diciembre';
  }
		?>
		<form method="POST" action="prueba2.php">
		<input type="hidden" name="mes" value="<?php echo $mes; ?>">
		<?php 
		$query4 = "SELECT * FROM puntos";
  $query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta facturacion");
  while ($fila4 = mysqli_fetch_array($query_exec4)) {

    	$doc = $fila4[3];
		$id_punto = $fila4[0];
		$saldo_ant = $fila4[4];
		$descuento = $fila4[6];
		$atrasos = $fila4[5];
		$estado = $fila4[2];
		
		if ($saldo_ant == 0) {
			echo $saldo_ant;
			echo "es igual a 0";
  	}else{
  		echo $saldo_ant;
  		echo "no es igual a 0";
  		$atrasos = $atrasos + 1;
  		$estado = 1;
  	}
  	$total_pagar = 13000+$saldo_ant-$descuento;

  	$query = "UPDATE puntos set saldo_ant = '$total_pagar', contador = '$atrasos', descuento = '$descuento', estado = '$estado'";
             $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
  	
  	if ($atrasos == 3) {
  		# code...
  	}else{
  		$query5 = "INSERT INTO facturacion (id_punto,documento,fecha_fact,periodo_fact,admin_mes,saldo_ant,id_mes,operador,total_pagar) VALUES ('$id_punto', '$doc', NOW(), '$mes1', 13000, '$saldo_ant','$mes', '$user','$total_pagar')";
  $query_exec5 = mysqli_query($db->conectar(),$query5)or die("no se puede realizar la consulta facturacion");
  $query2 = "SELECT * FROM facturacion ";
		$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
		while ($fila2 = mysqli_fetch_array($query_exec2)) {
			$n_fact = $fila2[0];
			?>
				<img style="display: none;" src="barcode.php?filepath=assets/<?php echo $n_fact; ?>.jpg&codetype=Code39&size=100&text=<?php echo $n_fact; ?>"/>			
			<?php 
		}
		 
  }
			
  	}
  	?>
		
		<input type="submit" name="fact2">
	</form>
	<?php
	}
		
	 ?>
</body>
</html>