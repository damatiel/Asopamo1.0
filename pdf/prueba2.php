<?php 
require_once __DIR__ . '/../php/conectar.php';

  $db = new DB_CONNECT();

  session_start();

$user = $_SESSION['nombres']." ".$_SESSION['apellidos'];
require_once 'variospdf.php';
if (isset($_POST["fact2"])) {
$mes = $_POST['mes'];
$ultimodia = $_POST['ultimodia'];
$num_inicial = $_POST['num_inicial'];
$num_final = $_POST['num_final'];

  

		$html = '
      <link rel="stylesheet" href="prueba.css">
    <div  id="codigo"></div>';
      # code...
    
$query = "SELECT * FROM facturacion WHERE id_mes = '$mes' AND estado ='1' ORDER BY dir ASC";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta facturacion");
  while ($fila = mysqli_fetch_array($query_exec)) {
      $n_fact = $fila[0];
      $id_punto = $fila[1];
      $doc = $fila[2];
      $f_fact = $fila[3];
      $p_fact = $fila[4];
      $descuento = $fila[12];
      $matricula = $fila[13];
      $traslado = $fila[14];
      $reactivacion = $fila[15];
      $multa = $fila[16];
      $admin_mes = $fila[5];
      $saldo_ant = $fila[6];
      $total_pagar = $fila[9];

    $query2 = "SELECT * FROM puntos WHERE id = '$id_punto'";
  $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta suscriptores");
    if ($fila2 = mysqli_fetch_array($query_exec2)) {
      $dir = $fila2[1]." ".$fila2['indicaciones'];
      $atrasos = $fila2[5];
    $query4 = "UPDATE puntos set descuento = 0,traslado = 0,reactivacion = 0,matricula =0, multa = 0 WHERE id = $id_punto";
   $query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta");
   $query4 = "UPDATE facturacion set estado = 2 ";
   $query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta");
    $query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
  $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta suscriptores");
    if ($fila3 = mysqli_fetch_array($query_exec3)) {

        $pNom = $fila3[1];
    $sNom = $fila3[2];
    $pApe = $fila3[3];
    $sApe = $fila3[4];
    $nomCompleto = $pNom." ".$sNom." ".$pApe." ".$sApe;
    $html.='

      <img class="gwd-img-xvwd gwd-img-12pu" src="assets/factura_1_original (2)_4.jpg" id="factura">
  <p class="gwd-p-ppgg gwd-p-14qa" id="num_fact">'.$n_fact.'</p>
  <p class="gwd-p-16rd gwd-p-q0r4"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1xo1"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1dj7 gwd-p-133f"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1h36"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-wotq"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1eat"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-huvl gwd-p-8dzf"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po gwd-p-1oc6" id="id_punto">'.$id_punto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht gwd-p-rv6v" id="subs">'.$nomCompleto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn gwd-p-1lcy" id="fecha_fact">'.$f_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-4ge5" id="per_fact">'.$p_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-i08h" id="per_fact_1">Atrasos:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-1hqo" id="per_fact_3">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-1m32" id="per_fact_4">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-suoa" id="per_fact_5">'.$ultimodia.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1oen" id="per_fact_2">'.$atrasos.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt gwd-p-1trv" id="dir">'.$dir.'</p>
  <p class="gwd-p-16rd gwd-p-1dj7 gwd-p-uoq1"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-huvl gwd-p-ujhy"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po gwd-p-1han" id="id_punto_1">'.$id_punto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht gwd-p-qjn1" id="subs_1">'.$nomCompleto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn gwd-p-rr0s" id="fecha_fact_1">'.$f_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-uiqp" id="per_fact_6">'.$p_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt gwd-p-ajdm" id="dir_1">'.$dir.'</p>
  <div class="gwd-div-1crj" id="codigo"></div>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-1wga">Administración del Mes</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-7vjl">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1o0l">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-pl9h">'.$admin_mes.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-ibug">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1hvk gwd-p-5car">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-q6vc gwd-p-kmkt">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1hvk gwd-p-1vib">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-q6vc gwd-p-1wb3">'.$total_pagar.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-13dn">Saldo Anterior</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-lgxp">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-1rrw">'.$saldo_ant.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-1nx0">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-1hrr">'.$descuento.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-6ppu">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-e63t">'.$traslado.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6 gwd-p-1p0n">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi gwd-p-yvzo">'.$reactivacion.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6 gwd-p-k48i gwd-p-1rae">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi gwd-p-1uq2 gwd-p-nial">'.$matricula.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-ncq9">Descuento</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-18ab">Traslado de Punto</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-8hmw">Reconexión</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-9mo5">Otros Conceptos</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1bt9 gwd-p-a5v1 gwd-p-ceg6 gwd-p-k48i gwd-p-1r4a">$</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-14r7 gwd-p-1baq gwd-p-1edg gwd-p-16jr gwd-p-11ry gwd-p-1avi gwd-p-1uq2 gwd-p-nc2t">'.$multa.'</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-1v3k">Multa</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-tp5p gwd-p-240t">OPERADOR:&nbsp;</p>
  <p class="gwd-p-d236 gwd-p-ediy gwd-p-1u8f gwd-p-14a8 gwd-p-ng4g gwd-p-1th5 gwd-p-tp5p gwd-p-1nly">'.$user.'</p>
  <p class="gwd-p-15yh gwd-p-5okj">NUMERO DE FACTURA :</p>
  <p class="gwd-p-15yh gwd-p-15u8">'.$n_fact.'</p>
  <p class="gwd-p-ph3h">TOTAL:</p>
      
      <img class="gwd-div-1crj" src="assets/'.$n_fact.'.jpg"/>';
      
      $html.='
      <div style="page-break-after:always;"></div>';
      }}}
      
      
		$name = 'facturas '.$p_fact.' '.$num_inicial.'-'.$num_final.'.pdf';
  $folder = __DIR__ .'/pdf/';
    
    // PDF::savedisk($name,$html,$folder);
    
  PDF::stream($name,$html);
  
  
   

}if (isset($_POST["fact3"])) {
  $mes = $_POST['mes'];
$html='
      <table>
          <tr>
            <th>ID</th>
            <th>Documento</th>
            <th></th>
            <th>Dirección</th>
            <th>Primer Nombre</th>
            <th>Primer Apellido</th>
          </tr>
          ';
        $query = "SELECT * FROM puntos WHERE contador = 2";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
          while ($fila = mysqli_fetch_array($query_exec)) {
            $id = $fila[0];
            $doc = $fila[3];
            $dir = $fila[1].' '.$fila['indicaciones'];
          
            $query2 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
            $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
        if ($fila2 = mysqli_fetch_array($query_exec2)) {
          $p_n = $fila2[1];
          $p_a = $fila2[3];
        }
            $html.='
              <tr>
                <td>'.$id.'</td> 
                <td>'.$doc.'</td> 
                <td></td> 
                <td>'.$dir.'</td>';
            $html.='
                <td>'.$p_n.'</td>
                <td>'.$p_a.'</td> 
              </tr>';
              }
            
        
  
  $html.='
      </table>
    </div>';
    
$name = 'cortes.pdf';
    
    // PDF::savedisk($name,$html,$folder);
  PDF::stream($name,$html);
}
if (isset($_POST["fact4"])) { 
  $mes = $_POST['mes'];
  $ultimodia = $_POST['ultimodia'];
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=Facturas '.$mes.'.xls');
 ?>
 <table>
  <tr>
    <th>Numero de Factura</th>
    <th>Id del Punto</th>
    <th>Numero de Cedula</th>
    <th>Fecha de Factura</th>
    <th>Periodo Facturado</th>
    <th>Administracion del mes</th>
    <th>Saldo Anterior</th>
    <th>Descuento</th>
    <th>Matricula</th>
    <th>Traslado</th>
    <th>Reactivacion</th>
    <th>Multa</th>
    <th>Total a Pagar</th>
  </tr>
  <?php 
    $query = "SELECT * FROM facturacion WHERE id_mes = '$mes'";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta facturacion");
  $total =0;
  $t_admin_mes=0;
  $t_saldo_ant=0;
  $t_descuento=0;
  $t_matricula=0;
  $t_traslado =0;
  $t_reactivacion=0;
  $t_multa=0;
  
  while ($fila = mysqli_fetch_array($query_exec)) {
    $id_punto = $fila[1];
    $query1 = "SELECT * FROM puntos WHERE id = '$id_punto'";
  $query_exec1 = mysqli_query($db->conectar(),$query1)or die("no se puede realizar la consulta facturacion");
  if($fila2 = mysqli_fetch_array($query_exec1)) {
  
      $n_fact = $fila[0];
      $id_punto = $fila[1];
      $doc = $fila[2];
      $f_fact = $fila[3];
      $p_fact = $fila[4];
      $admin_mes = $fila[5];
      $saldo_ant = $fila[6];
      $descuento = $fila[12];
      $matricula = $fila[13];
      $traslado = $fila[14];
      $reactivacion = $fila[15];
      $multa = $fila[16];
      $total_pagar = $fila[9];
    }
   ?>
  <tr>
    <td><?php echo $n_fact; ?></td>
    <td><?php echo $id_punto; ?></td>
    <td><?php echo $doc; ?></td>
    <td><?php echo $f_fact; ?></td>
    <td><?php echo $p_fact; ?></td>
    <td><?php echo $admin_mes; ?></td>
    <td><?php echo $saldo_ant; ?></td>
    <td><?php echo $descuento; ?></td>
    <td><?php echo $matricula; ?></td>
    <td><?php echo $traslado; ?></td>
    <td><?php echo $reactivacion; ?></td>
    <td><?php echo $multa; ?></td>
    <td><?php echo $total_pagar; ?></td>
  </tr>
  <?php 
  $total = $total + $total_pagar;
  $t_admin_mes = $t_admin_mes + $admin_mes;
  $t_saldo_ant=$t_saldo_ant+$saldo_ant;
  $t_descuento=$t_descuento+$descuento;
  $t_matricula=$t_matricula+$matricula;
  $t_reactivacion=$t_reactivacion+$reactivacion;
  $t_multa=$t_multa+$multa;
}
   ?>
   <tr>
     <td>Total</td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td><?php echo $t_admin_mes; ?></td>
     <td><?php echo $t_saldo_ant; ?></td>
     <td><?php echo $t_descuento; ?></td>
     <td><?php echo $t_matricula; ?></td>
     <td><?php echo $t_traslado; ?></td>
     <td><?php echo $t_reactivacion; ?></td>
     <td><?php echo $t_multa; ?></td>
     <td><?php echo $total; ?></td>
   </tr>
 </table>
 <?php
}

 ?>
