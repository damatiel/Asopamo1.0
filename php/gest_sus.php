<?php 
require_once __DIR__ . '/conectar.php';
echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
	$db = new DB_CONNECT();
if (isset($_POST["submit1"])) {

	$doc = $_POST['documento'];
	$pn = $_POST['txtPNnombre'];
	$sn = $_POST['txtSNnombre'];
	$pa = $_POST['txtPApellido'];
	$sa = $_POST['txtSApellido'];
	$dir = $_POST['txtDireccion'];
	$tel = $_POST['txtTelefono'];
	$query ="UPDATE suscriptores SET primer_nom='$pn',segundo_nom='$sn',primer_ape='$pa',segundo_ape='$sa',estado=1,tel='$tel',direc='$dir' WHERE doc = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
echo "
				<script>
				alert('Suscriptor actualizado');
				redir('suscriptores.php');
				</script>
				";

}
if (isset($_POST["submit2"])) {

	$doc = $_POST['documento'];
	$query ="DELETE FROM suscriptores WHERE doc = '$doc'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	echo "
		<script>
			alert('Suscriptor eliminado');
			redir('suscriptores.php');
		</script>
	";
}

 ?>