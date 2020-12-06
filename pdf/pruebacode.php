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
	if (isset($_POST["IdPunto"])) {
		$id_punto = $_POST['IdPunto'];
		$query = "SELECT * FROM puntos WHERE id = '$id_punto'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 18");
	}
	if ($fila = mysqli_fetch_array($query_exec)) {
		$dire = $fila['dir'];
		$query = "SELECT * FROM valores WHERE id = 1 ";
		$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 23");
		if ($fila2 = mysqli_fetch_array($query_exec)) {
				$admin_mes = $fila2[2];
			}
		$indi =$fila[13];
		$doc = $fila[3];
		$id_punto = $fila[0];
		$saldo_ant = $fila[4];
		$atrasos = $fila[5];
		$descuento = $fila[6];
		$matricula = $fila[7];
		$traslado = $fila[8];
		$reactivacion = $fila[9];
		$multa = $fila[12];
	}
		$dire = $dire.$indi;
		$saldo_ant = $saldo_ant-$admin_mes;
	
		
			 $total_pagar = $admin_mes+$saldo_ant+$matricula+$traslado+$reactivacion-$descuento;
			 $query = "UPDATE facturacion set total_pagar = '$total_pagar' WHERE id_punto = $id_punto";
			$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 44");
		

		$query2 = "SELECT * FROM facturacion WHERE id_punto = '$id_punto' ORDER BY numero_fact DESC";
		$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta linea 48");
		if ($fila2 = mysqli_fetch_array($query_exec2)) {
			$n_fact = $fila2[0];
			$f_fact = $fila2[3];
			$p_fact = $fila2[4];
			$admin_mes = $fila2[5];
			$saldo_ant = $fila2[6];
			//  $descuento = $fila2[12];
			//  $matricula = $fila2[13];
			//  $traslado = $fila2[14];
			//  $reactivacion = $fila2[15];
			//  $multa = $fila2[16];
			//  $total_pagar = $admin_mes+$saldo_ant+$matricula+$traslado+$reactivacion-$descuento;
			//  $query = "UPDATE facturacion set total_pagar = '$total_pagar' WHERE id_punto = $id_punto";
			// $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
		$query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
		$query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta linea 64");
		if ($fila3 = mysqli_fetch_array($query_exec3)) {
			$pNom = $fila3[1];
			$sNom = $fila3[2];
			$pApe = $fila3[3];
			$sApe = $fila3[4];
		$nomCompleto = $pNom." ".$sNom." ".$pApe." ".$sApe;
		$query4 = "UPDATE pagos set descuento = '$descuento', traslado = '$traslado',reactivacion='$reactivacion',matricula='$matricula',total = '$total_pagar'  WHERE id_punto = '$id_punto' AND periodo_fact = '$p_fact'";	
		$query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta pagos linea 72");
		$query5 = "SELECT * FROM pagos WHERE id_punto = '$id_punto' AND periodo_fact = '$p_fact'";
		$query_exec5 = mysqli_query($db->conectar(),$query5)or die("no se puede realizar la consulta linea 74");
		if ($fila5 = mysqli_fetch_array($query_exec5)) {
			$ultimodia = $fila5[6];
		}
	?>
	
	<?php 
		}}else{
			echo "
				<script>
				alert('Se agregaron datos incorrectos');
				redir('../php/facturacion.php');
				</script>
				";
		}?>

		<form method="POST" action="prueba.php">
		<input type="hidden" name="dir" value="<?php echo $dire; ?>">
		<input type="hidden" name="n_fact" value="<?php echo $n_fact; ?>">
		<input type="hidden" name="id_punto" value="<?php echo $id_punto; ?>">
		<input type="hidden" name="p_nom" value="<?php echo $nomCompleto; ?>">
		<input type="hidden" name="f_fact" value="<?php echo $f_fact; ?>">
		<input type="hidden" name="p_fact" value="<?php echo $p_fact; ?>">
		<input type="hidden" name="doc" value="<?php echo $doc; ?>">
		<input type="hidden" name="atrasos" value="<?php echo $atrasos; ?>">
		<input type="hidden" name="admin_mes" value="<?php echo $admin_mes; ?>">
		<input type="hidden" name="saldo_ant" value="<?php echo $saldo_ant; ?>">
		<input type="hidden" name="descuento" value="<?php echo $descuento; ?>">
		<input type="hidden" name="total_pagar" value="<?php echo $total_pagar; ?>">
		<input type="hidden" name="user" value="<?php echo $user; ?>">
		<input type="hidden" name="ultimodia" value="<?php echo $ultimodia; ?>">
		<input type="hidden" name="mes" value="<?php echo $p_fact; ?>">
		<input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
		<input type="hidden" name="traslado" value="<?php echo $traslado; ?>">
		<input type="hidden" name="reactivacion" value="<?php echo $reactivacion; ?>">
		<input type="hidden" name="multa" value="<?php echo $multa; ?>">
		<img style="display: none;" src="barcode.php?filepath=assets/<?php echo $doc; ?>.jpg&codetype=Code39&size=1&text=<?php echo $n_fact; ?>"/>
		<input type="submit" name="fact1">
	</form>
	<?php 
	}
	if (isset($_POST["imprimirt"])) {

		$mes = $_POST['mes'];
		$ultimodia = $_POST['fmes'];
		$num_inicial = $_POST['num_inicial'];
		$num_final = $_POST['num_final'] + 1;
		if ($mes == 1) {
    $mes1 = 'Enero';
  }if ($mes == 2) {
    $mes1 = 'Febrero';
  }if ($mes == 3) {
    $mes1 = 'Marzo';
  }if ($mes == 4) {
    $mes1 = 'Abril';
  }if ($mes == 5) {
    $mes1 = 'Mayo';
  }if ($mes == 6) {
    $mes1 = 'Junio';
  }if ($mes == 7) {
    $mes1 = 'Julio';
  }if ($mes == 8) {
    $mes1 = 'Agosto';
  }if ($mes == 9) {
    $mes1 = 'Septiembre';
  }if ($mes == 10) {
    $mes1 = 'Octubre';
  }if ($mes == 11) {
    $mes1 = 'Noviembre';
  }if ($mes == 12) {
    $mes1 = 'Diciembre';
  }
		?>
		<form method="POST" action="prueba2.php">
		<input type="hidden" name="mes" value="<?php echo $mes; ?>">
		<input type="hidden" name="num_inicial" value="<?php echo $num_inicial; ?>">
		<input type="hidden" name="num_final" value="<?php echo $num_final; ?>">
		<input type="hidden" name="ultimodia" value="<?php echo $ultimodia; ?>">
		<?php 
		for ($i=$num_inicial; $i < $num_final; $i++) { 

		$query4 = "SELECT * FROM puntos WHERE id = '$i'";
  		$query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta linea 156");
  		while ($fila4 = mysqli_fetch_array($query_exec4)) {
  			$query = "SELECT * FROM valores WHERE id = 1 ";
			$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 159");
		if ($fila = mysqli_fetch_array($query_exec)) {
				$admin_mes = $fila[2];
				$multa = $fila[2];
			}
			$query = "SELECT * FROM valores WHERE id = 5 ";
			$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 165");
		if ($fila = mysqli_fetch_array($query_exec)) {
				$multa = $fila[2];
			}

    	$doc = $fila4[3];
		$id_punto = $fila4[0];
		$saldo_ant = $fila4[4];
		$descuento = $fila4[6];
		$atrasos = $fila4[5];
		$estado = $fila4[2];
		$matricula = $fila4[7];
		$traslado = $fila4[8];
		$reactivacion = $fila4[9];
		$dire = $fila4[1];
		$dir2 = $fila4['indicaciones'];
		$dir = $dire." ".$dir2;

		$query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
	$query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta linea 184");
	if ($fila3 = mysqli_fetch_array($query_exec3)) {
		$pNom = $fila3[1];
		$sNom = $fila3[2];
		$pApe = $fila3[3];
		$sApe = $fila3[4];
		$nomCompleto = $pNom." ".$sNom." ".$pApe." ".$sApe;
	}
  		if ($atrasos >= 5) {
  			$estado = 4;
  			$query = "UPDATE puntos set estado = '$estado' WHERE id = $id_punto";
            $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 195");
  		}elseif ($atrasos >= 2) {
  			$atrasos = $atrasos + 1;
  			$estado = 3;
  			$query = "UPDATE puntos set contador = '$atrasos', estado = '$estado' WHERE id = $id_punto";
            $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 200");
  		}elseif ($estado == 5) {
  			$query = "UPDATE puntos set estado = '$estado' WHERE id = $id_punto";
        	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 203");
  		}else{
  			if ($saldo_ant > 0) {
				$atrasos = $atrasos + 1;
  				$estado = 1;
  			}else{
  				$multa = 0;
  			}
  				$query2 = "SELECT * FROM facturacion WHERE id_mes = '$mes' AND id_punto = '$id_punto'";
				$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta linea 212");
				if ($fila2 = mysqli_fetch_array($query_exec2)) {


				}else{
					$total_pagar = $admin_mes+$saldo_ant+$matricula+$traslado+$reactivacion+$multa-$descuento;
  					$query = "UPDATE puntos set saldo_ant = '$total_pagar', contador = '$atrasos', descuento = '$descuento', estado = '$estado', multa = '$multa' WHERE id = '$id_punto'";
  					echo $id_punto;
  					echo "/";
  					echo $total_pagar;
  					echo "/";
  					echo $atrasos;
  					echo "/";
  					echo $descuento;
  					echo "/";
  					echo $estado;
  					echo "/";
  					echo $multa;
  					echo "-";
             		$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 219");
  					$query5 = "INSERT INTO facturacion (id_punto,documento,fecha_fact,periodo_fact,admin_mes,saldo_ant,id_mes,operador,total_pagar,dir,estado,descuento,matricula,traslado,reactivacion,multa) VALUES ('$id_punto', '$doc', NOW(), '$mes1','$admin_mes', '$saldo_ant','$mes', '$user','$total_pagar','$dir','1','$descuento','$matricula','$traslado','$reactivacion','$multa')";
  					$query_exec5 = mysqli_query($db->conectar(),$query5)or die("no se puede realizar la consulta linea 221");
   					$query2 = "INSERT INTO pagos (id_punto,atrasos,fecha_limite,nom_suscriptor,fecha_factura,direccion,periodo_fact,admin_mes,saldo_anterior,descuento,traslado,reactivacion,matricula,total,documento,estado,multa) VALUES ('$id_punto','$atrasos','$ultimodia','$nomCompleto',NOW(),'$dir','$mes1','$admin_mes','$saldo_ant','$descuento','$traslado','$reactivacion','$matricula','$total_pagar','$doc',0,'$multa') ";
   					$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta linea 223");
   					$query2 = "SELECT * FROM facturacion WHERE id_punto = '$id_punto' AND periodo_fact = '$mes1'";
					$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta linea 225");
					if ($fila2 = mysqli_fetch_array($query_exec2)) {
						$n_fact = $fila2[0];
					?>

					<img style="display: none;" src="barcode.php?filepath=assets/<?php echo $n_fact; ?>.jpg&codetype=Code39&size=1&text=<?php echo $n_fact; ?>"/>			
					<?php 
					}
				}
  	
  					
  				}
  			}
		}
  	
  
  	?>
		<input type="hidden" name="id_punto" value="<?php echo $id_punto; ?>">
		<input type="submit" name="fact2" value="Imprimir Facturas">
		<input type="submit" name="fact4" value="Imprimir reporte de excel de la factura del mes">
		<input type="submit" name="fact3" value="Imprimir cortes">
	</form>
	<?php
	}
		
	 ?>
</body>
</html>