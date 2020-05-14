<?php 
require_once __DIR__ . '/../php/conectar.php';

  $db = new DB_CONNECT();

  session_start();
require_once 'variospdf.php';
if (isset($_POST["fact2"])) {
$mes = $_POST['mes'];
if ($mes == 1) {
    $mes1 = 'enero';
  }if ($mes == 2) {
    $mes1 = 'febrero';
  }if ($mes == 3) {
    $mes1 = 'marzo';
  }if ($mes == 4) {
    $mes1 = 'abril';
  }if ($mes == 5) {
    $mes1 = 'mayo';
  }if ($mes == 6) {
    $mes1 = 'junio';
  }if ($mes == 7) {
    $mes1 = 'julio';
  }if ($mes == 8) {
    $mes1 = 'agosto';
  }if ($mes == 9) {
    $mes1 = 'septiembre';
  }if ($mes == 10) {
    $mes1 = 'octubre';
  }if ($mes == 11) {
    $mes1 = 'noviembre';
  }if ($mes == 12) {
    $mes1 = 'diciembre';
  }
  $query4 = "SELECT * FROM puntos";
  $query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta facturacion");
  while ($fila4 = mysqli_fetch_array($query_exec4)) {
    $doc = $fila4[3];
    $id_punto = $fila4[0];
    $saldo_ant = $fila4[4];
    $descuento = $fila4[6];
    $total_pagar = 13000+$saldo_ant-$descuento;
    $query5 = "INSERT INTO facturacion (id_punto,documento,fecha_fact,periodo_fact,admin_mes,saldo_ant,id_mes,operador,total_pagar) VALUES ('$id_punto', '$doc', NOW(), '$mes1', 13000, '$saldo_ant','$mes', '$user','$total_pagar')";
  $query_exec5 = mysqli_query($db->conectar(),$query5)or die("no se puede realizar la consulta facturacion");
  }


  $query = "SELECT * FROM facturacion WHERE id_mes = '$mes'";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta facturacion");
  while ($fila = mysqli_fetch_array($query_exec)) {
    $n_fact = $fila[0];
    $id_punto = $fila[1];
    $doc = $fila[2];
    $f_fact = $fila[3];
    $p_fact = $fila[4];

    $query2 = "SELECT * FROM puntos WHERE id = '$id_punto'";
  $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta suscriptores");
    if ($fila2 = mysqli_fetch_array($query_exec2)) {
    	$dir = $fila2[1];
    $query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
  $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta suscriptores");
    if ($fila3 = mysqli_fetch_array($query_exec3)) {

      	$p_nom = $fila3[1];

      	$name = 'factura '.$n_fact.'.pdf';
		$html = '<link rel="stylesheet" href="prueba.css">
		<div  id="codigo"></div>

		  <img class="gwd-img-xvwd gwd-img-12pu" src="assets/factura_1_original (1).jpg" id="factura">
		  <img class="gwd-img-xvwd gwd-img-1pzk" src="assets/factura_1_original (1).jpg" id="factura_1">
		  <p class="gwd-p-ppgg gwd-p-14qa" id="num_fact">'.$n_fact.'</p>
		  <p class="gwd-p-ppgg gwd-p-1hiz" id="num_fact_1">'.$n_fact.'</p>
		  <p class="gwd-p-16rd"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
		  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
		  <p class="gwd-p-1mkd gwd-p-x0po" id="id_punto">'.$id_punto.'</p>
		  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht" id="subs">'.$p_nom.'</p>
		  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn" id="fecha_fact">'.$f_fact.'</p>
		  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc" id="per_fact">'.$p_fact.'</p>
		  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt" id="dir">'.$dir.'</p>
		  
		  <img class="gwd-div-1crj" src="assets/'.$n_fact.'.jpg"/>';
		$folder = __DIR__ .'/pdf/';
		PDF::savedisk($name,$html,$folder);
  }}}}

 ?>