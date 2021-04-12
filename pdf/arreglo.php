<?php 
require_once __DIR__ . '/../php/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  $query = "SELECT * FROM facturacion WHERE  total_pagar >= 100000";
                  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                  while($fila = mysqli_fetch_array($query_exec)){
                  	$n_fact = $fila[0];
                  	$id_punto = $fila[1];
                  	$nuevo = $fila['total_pagar'];
                  	$total = $nuevo - 100000;
                  	$query2 = "UPDATE facturacion set total_pagar = '$total' WHERE numero_fact = $n_fact";
                  	$query_exec2 = mysqli_query($db->conectar(),$query2)or die("No se pudo conectar linea 16");
                  	$query2 = "UPDATE puntos set saldo_ant = '$total' WHERE id = $id_punto";
                  	$query_exec2 = mysqli_query($db->conectar(),$query2)or die("No se pudo conectar linea 18");
                  }
 ?>