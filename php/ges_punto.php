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
		$query2 ="INSERT INTO puntos (dir,estado,doc_suscriptor,saldo_ant,contador,descuento,matricula,traslado,reactivacion,form_pago,fecha_act) VALUES ('$dire',1,'$doc',0,0,0,0,0,0,0,NOW())";
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

if (isset($_POST['buscarpunto'])) {
	echo "buscarpunto";
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
	$p_a = $_POST['p_n'];
	$p_a = $_POST['p_a'];
	$query ="UPDATE puntos SET dir='$dir',doc_suscriptor='$doc' WHERE doc_suscriptor = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
echo "
				<script>
				alert('punto actualizado');
				redir('puntos.php');
				</script>
				";
}
if (isset($_POST['eliminarpunto'])) {
	$doc = $_POST['documento'];
	$query ="DELETE FROM puntos WHERE doc_suscriptor = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	echo "
		<script>
			alert('Punto eliminado');
			redir('puntos.php');
		</script>
	";
}

 ?>