<?php 
require_once __DIR__ . '/../php/conectar.php';
$db = new DB_CONNECT();

// $query4 = "SELECT * FROM puntos";
// $query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta linea 156");
// while ($fila4 = mysqli_fetch_array($query_exec4)) {

// 	$id = $fila4[0];

	// $query = "UPDATE puntos set estado = 5, saldo_ant = 0 WHERE contador >= 4";
	// $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 10");

	// $query = "UPDATE puntos set saldo_ant = 0 WHERE estado >= 4";
	// $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 13");

	// $query = "UPDATE puntos set estado = 5, contador = 5 WHERE saldo_ant >= 16000 AND internet <= 0";
	// $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 16");

	// $query = "UPDATE puntos set contador = 5 WHERE estado >= 5";
	// $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 18");

	//$query = "UPDATE puntos set estado = 3 WHERE contador >= 5 AND saldo_ant >= 1";
	//$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 18");

	// $query = "UPDATE puntos set contador = 0 WHERE estado >=5";
	// $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 18");

	
	
 // }

$query = "SELECT * FROM pagos";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 28");
	while($fila1 = mysqli_fetch_array($query_exec)){

		$fecha_fin = $fila1[6];
		$id_pago = $fila1[0];

	$query2 = "UPDATE pagos set fecha_pago = '$fecha_fin' WHERE id_entPago >= 0 AND id_pagos = $id_pago";
	$query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta linea 34");
	



	}


// $mes1 = 'Enero'.date("Y");
// echo $mes1;

?>