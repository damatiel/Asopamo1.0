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
echo "crear punto";
}
if (isset($_POST['buscarpunto'])) {
	echo "buscarpunto";
}

 ?>