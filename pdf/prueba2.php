<?php 
require_once __DIR__ . '/../php/conectar.php';

  $db = new DB_CONNECT();

  session_start();

$user = $_SESSION['nombres'];
require_once 'variospdf.php';
if (isset($_POST["fact2"])) {
$mes = $_POST['mes'];
        

  

		$html = '
      <link rel="stylesheet" href="prueba.css">
    <div  id="codigo"></div>';
$query = "SELECT * FROM facturacion WHERE id_mes = '$mes'";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta facturacion");
  while ($fila = mysqli_fetch_array($query_exec)) {
      $n_fact = $fila[0];
      $id_punto = $fila[1];
      $doc = $fila[2];
      $f_fact = $fila[3];
      $p_fact = $fila[4];
    $admin_mes = $fila[5];
    $saldo_ant = $fila[6];

    $query2 = "SELECT * FROM puntos WHERE id = '$id_punto'";
  $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta suscriptores");
    if ($fila2 = mysqli_fetch_array($query_exec2)) {
      $dir = $fila2[1];
      $descuento = $fila2[6];
    $atrasos = $fila2[5];
    $total_pagar = 13000+$saldo_ant-$descuento;
    $query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
  $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta suscriptores");
    if ($fila3 = mysqli_fetch_array($query_exec3)) {

        $p_nom = $fila3[1];
    $html.='

      <img class="gwd-img-xvwd gwd-img-12pu" src="assets/factura_1_original (1).jpg" id="factura">
  <p class="gwd-p-ppgg gwd-p-14qa" id="num_fact">'.$n_fact.'</p>
  <p class="gwd-p-16rd gwd-p-q0r4"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1xo1"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1dj7"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1h36"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-wotq"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1eat"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-huvl"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po" id="id_punto">'.$id_punto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht" id="subs">'.$p_nom.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn" id="fecha_fact">'.$f_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc" id="per_fact">'.$p_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d" id="per_fact_1">Atrasos:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0" id="per_fact_3">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0" id="per_fact_4">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-suoa" id="per_fact_5">31/05/2020</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1oen" id="per_fact_2">'.$atrasos.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt" id="dir">'.$dir.'</p>
  <div class="gwd-div-1crj" id="codigo"></div>
  <p class="gwd-p-d236 gwd-p-1g7m">Administración del Mes</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1">'.$admin_mes.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1hvk">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-q6vc">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7">Saldo Anterior</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg">'.$saldo_ant.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr">'.$descuento.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry">0</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi">0</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6 gwd-p-k48i">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi gwd-p-1uq2">0</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-ncq9">Descuento</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-18ab">Traslado de Punto</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-8hmw">Reconexión</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5">Otros Conceptos</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-tp5p">OPERADOR:&nbsp;</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-tp5p gwd-p-1nly">'.$user.'</p>
      
      <img class="gwd-div-1crj" src="assets/'.$n_fact.'.jpg"/>
      <div style="page-break-after:always;"></div>';
      }}}
      $html.='
    ';

		$name = 'facturas '.$p_fact.'.pdf';
  $folder = __DIR__ .'/pdf/';
    
		// PDF::savedisk($name,$html,$folder);
  PDF::stream($name,$html);
  
  
}
if (isset($_POST["fact3"])) {
$mes = $_POST['mes'];
        

  

    $html = '
      <link rel="stylesheet" href="prueba.css">
    <div  id="codigo"></div>';
$query = "SELECT * FROM facturacion WHERE id_mes = '$mes'";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta facturacion");
  while ($fila = mysqli_fetch_array($query_exec)) {
      $n_fact = $fila[0];
      $id_punto = $fila[1];
      $doc = $fila[2];
      $f_fact = $fila[3];
      $p_fact = $fila[4];
    $admin_mes = $fila[5];
    $saldo_ant = $fila[6];

    $query2 = "SELECT * FROM puntos WHERE id = '$id_punto'";
  $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta suscriptores");
    if ($fila2 = mysqli_fetch_array($query_exec2)) {
      $dir = $fila2[1];
      $descuento = $fila2[6];
    $atrasos = $fila2[5];
    $total_pagar = 13000+$saldo_ant-$descuento;
    $query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
  $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta suscriptores");
    if ($fila3 = mysqli_fetch_array($query_exec3)) {

        $p_nom = $fila3[1];
    $html.='

      <img class="gwd-img-xvwd gwd-img-12pu" src="assets/factura_1_original (1).jpg" id="factura">
  <p class="gwd-p-ppgg gwd-p-14qa" id="num_fact">'.$n_fact.'</p>
  <p class="gwd-p-16rd gwd-p-q0r4"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1xo1"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1dj7"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1h36"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-wotq"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1eat"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-huvl"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po" id="id_punto">'.$id_punto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht" id="subs">'.$p_nom.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn" id="fecha_fact">'.$f_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc" id="per_fact">'.$p_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d" id="per_fact_1">Atrasos:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0" id="per_fact_3">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0" id="per_fact_4">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-suoa" id="per_fact_5">31/05/2020</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1oen" id="per_fact_2">'.$atrasos.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt" id="dir">'.$dir.'</p>
  <div class="gwd-div-1crj" id="codigo"></div>
  <p class="gwd-p-d236 gwd-p-1g7m">Administración del Mes</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1">'.$admin_mes.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1hvk">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-q6vc">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7">Saldo Anterior</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg">'.$saldo_ant.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr">'.$descuento.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry">0</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi">0</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6 gwd-p-k48i">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi gwd-p-1uq2">0</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-ncq9">Descuento</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-18ab">Traslado de Punto</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-8hmw">Reconexión</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5">Otros Conceptos</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-tp5p">OPERADOR:&nbsp;</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-tp5p gwd-p-1nly">'.$user.'</p>
      
      <img class="gwd-div-1crj" src="assets/'.$n_fact.'.jpg"/>
      <div style="page-break-after:always;"></div>';
      }}}
      $html.='
    ';

    $name = 'facturas '.$p_fact.'.pdf';
  $folder = __DIR__ .'/pdf/';
    
    // PDF::savedisk($name,$html,$folder);
  PDF::stream($name,$html);
}

 ?>
