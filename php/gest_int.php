<?php  
require_once __DIR__ . '/conectar.php';
echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
	$db = new DB_CONNECT();
if (isset($_POST['activar_inter'])) {
	if (isset($_POST['activo'])) {
			$activar= $_POST['activo'];
			$query ="UPDATE puntos SET internet='1' WHERE id = '$activar'";
				$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
				echo "
 				<script>
 				alert('Se activo el servicio de forma correcta, porfavor dirigase a facturacion, para generar una factura');
 				redir('internet.php');
 				</script>
				";

		}
	}
?>