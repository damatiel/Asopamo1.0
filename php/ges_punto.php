<?php 
require_once __DIR__ . '/conectar.php';
echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
	$db = new DB_CONNECT();
if (isset($_POST["crearpunto"])) {
	$doc = $_POST['cedula'];
	$td = $_POST['tipo_direc'];
	$n1 = $_POST['numero_direc'];
	$n2 = $_POST['numero2_direc'];
	$n3 = $_POST['numero3_direc'];
	$dire = $td.$n1.'#'.$n2.'-'.$n3;
	$query ="SELECT * FROM suscriptores WHERE doc = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	if ($fila = mysqli_fetch_array($query_exec)) {
		$query2 ="INSERT INTO puntos (dir,estado,doc_suscriptor,saldo_ant,contador,descuento,matricula,traslado,reactivacion,form_pago,fecha_act,multa) VALUES ('$dire',1,'$doc',0,0,0,0,0,0,0,NOW(),0)";
		$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");

	echo "
				<script>
				alert('Se añadio el punto de forma correcta');
				redir('puntos.php');
				</script>
				";
			}else{
				echo "
				<script>
				alert('no existe ese suscriptor, porfavor agregelo');
				redir('suscriptores.php');
				</script>
				";
			}

	
}
if (isset($_POST['registrardescuento'])) {
	$doc = $_POST['documento'];
	$desc = $_POST['descuento'];
	if (isset($_POST['matricula'])) {
			$matricula = $_POST['matricula'];
			$query ="SELECT * FROM valores WHERE id = '$matricula'";
			$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
			if ($fila = mysqli_fetch_array($query_exec)) {
				$matricula = $fila[2];
				$query ="UPDATE puntos SET matricula='$matricula' WHERE doc_suscriptor = '$doc'";
				$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
			}

		}
	if (isset($_POST['traslado'])) {
			$traslado = $_POST['traslado'];
			$query ="SELECT * FROM valores WHERE id = '$traslado'";
			$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
			if ($fila = mysqli_fetch_array($query_exec)) {
				$traslado = $fila[2];
				$query ="UPDATE puntos SET traslado='$traslado' WHERE doc_suscriptor = '$doc'";
				$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
			}
		}
	if (isset($_POST['reactivacion'])) {
			$reactivacion = $_POST['reactivacion'];
			$query ="SELECT * FROM valores WHERE id = '$reactivacion'";
			$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
			if ($fila = mysqli_fetch_array($query_exec)) {
				$reactivacion = $fila[2];
				$query ="UPDATE puntos SET reactivacion='$reactivacion' WHERE doc_suscriptor = '$doc'";
				$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
			}
		}
	$query ="UPDATE puntos SET descuento='$desc' WHERE doc_suscriptor = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
 echo "
 				<script>
 				alert('descuento asignado');
 				redir('puntos.php');
 				</script>
				";
 }
if (isset($_POST['actualizarpunto'])) {
	$doc = $_POST['documento'];
	$dir = $_POST['dir'];
	$query ="UPDATE puntos SET dir='$dir' WHERE doc_suscriptor = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
echo "
				<script>
				alert('punto actualizado');
				redir('puntos.php');
				</script>
				";
}
if (isset($_POST['suspender'])) {
	$doc = $_POST['documento'];
	$id_punto = $_POST['id_punto'];
	$query ="SELECT * FROM puntos WHERE id = '$id_punto'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	if ($fila = mysqli_fetch_array($query_exec)) {
		$deuda = $fila[4];
	}
	if ($deuda == 0) {
		$query ="UPDATE puntos SET estado = 3 WHERE id = '$id_punto'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	echo "
		<script>
			alert('Punto suspendido');
			redir('puntos.php');
		</script>
	";
	}else{
		echo "
		<script>
			alert('El punto no se puede suspender porque tiene deuda');
			redir('puntos.php');
		</script>
	";
	}
	
}
if (isset($_POST['activar'])) {
	$doc = $_POST['documento'];
	$id_punto = $_POST['id_punto'];
	$query ="UPDATE puntos SET estado = 2 WHERE id = '$id_punto'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	echo "
		<script>
			alert('Punto activado');
			redir('puntos.php');
		</script>
	";
}if (isset($_POST['venderpunto'])) {
	$doc = $_POST['documento'];
	$id_punto = $_POST['id_punto'];
	$cedula2 = $_POST['cedula2'];
	$query = "SELECT * FROM suscriptores WHERE doc = '$cedula2'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	if ($fila = mysqli_fetch_array($query_exec)) {
	$query ="UPDATE puntos SET doc_suscriptor = $cedula2 WHERE id = '$id_punto'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	echo "
		<script>
			alert('Punto Vendido');
			redir('puntos.php');
		</script>
	";
	}else{
		echo "
		<script>
			alert('El numero de cedula que ingreso no es suscriptor, porfavor agreguelo');
			redir('puntos.php');
		</script>
	";
	}
}

 ?>