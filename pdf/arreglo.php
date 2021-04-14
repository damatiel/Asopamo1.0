<?php 
require_once __DIR__ . '/../php/conectar.php';

$db = new DB_CONNECT();

session_start();
$query = "SELECT * FROM valores WHERE id = 6";
$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consultamlinea 8");
if($fila3 = mysqli_fetch_array($query_exec)){
  $vinternet= $fila3[2];

}
$query = "SELECT * FROM puntos WHERE  internet = 2";
$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 14");

while($fila = mysqli_fetch_array($query_exec)){
 $id = $fila[0];
 $mes = 'Abril';
 echo $id;
 $query = "SELECT * FROM facturacion WHERE id_punto = '$id' AND periodo_fact = '$mes'";
 $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 19");
 if($fila2 = mysqli_fetch_array($query_exec)){
  $total = $fila2['total_pagar'] + $vinternet;
  $fact = $fila2[0];
}
$query2 = "UPDATE facturacion set total_pagar = '$total', internet = '$vinternet' WHERE numero_fact = '$fact'";
$query_exec2 = mysqli_query($db->conectar(),$query2)or die("No se pudo conectar linea 24");
$query2 = "UPDATE pagos set total = '$total', internet = '$vinternet' WHERE num_factura = '$fact'";
$query_exec2 = mysqli_query($db->conectar(),$query2)or die("No se pudo conectar linea 26");
}
?>