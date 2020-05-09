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
	$dire = '<p>'.$td.$n1.'#'.$n2.'-'.$n3.'</p>';
	echo $dire;
}
if (isset($_POST['buscarpunto'])) {
	echo "buscarpunto";
}
if (isset($_POST['registrardescuento'])) {
	echo "registrar descuento";
}
if (isset($_POST['actualizarpunto'])) {
	echo "actualizar punto";
}
if (isset($_POST['eliminarpunto'])) {
	echo "eliminar punto";
}

 ?>