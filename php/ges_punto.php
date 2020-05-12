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
	$query ="INSERT INTO puntos (dir,estado,doc_suscriptor,fecha_act) VALUES ('$dire',1,'$doc',NOW())";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

	echo "
				<script>
				alert('Se añadio el punto de forma correcta');
				redir('puntos.php');
				</script>
				";
}

if (isset($_POST['buscarpunto'])) {
	echo "buscarpunto";
}
if (isset($_POST['registrardescuento'])) {
	$doc = $_POST['documento'];
	$desc = $_POST['descuento'];
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
	$query ="UPDATE puntos SET descuento='$desc' WHERE doc_suscriptor = '$doc'";
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