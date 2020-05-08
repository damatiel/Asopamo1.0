<?php 
require_once __DIR__ . '/conectar.php';
echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
	$db = new DB_CONNECT();
if (isset($_POST["submit"])) {

	$doc = $_POST['variable1'];
	$pn = $_POST['txtPNnombre'];
	$sn = $_POST['txtSNnombre'];
	$pa = $_POST['txtPApellido'];
	$sa = $_POST['txtSApellido'];
	$dir = $_POST['txtDireccion'];
	$tel = $_POST['txtTelefono'];

	$query ="INSERT INTO suscriptores (doc,primer_nom,segundo_nom,primer_ape,segundo_ape,estado,tel,direc) VALUES ('$doc', '$pn', '$sn', '$pa', '$sa', 1, '$tel', '$dir')";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

	echo "
				<script>
				alert('Suscriptor agregado');
				redir('suscriptores.php');
				</script>
				";
}

 ?>
