<?php 
require_once __DIR__ . '/../php/conectar.php';
$db = new DB_CONNECT();

$query4 = "SELECT * FROM puntos";
$query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta linea 156");
while ($fila4 = mysqli_fetch_array($query_exec4)) {

	$query = "UPDATE puntos set estado = 5, saldo_ant = 0 WHERE contador >= 4";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 195");
}

?>