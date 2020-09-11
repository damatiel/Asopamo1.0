
<?php  
  require_once __DIR__ . '/../php/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.html"); 
}   
// incluye el cargador automático 
require_once 'autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf();   
?>

<?php 
if (isset($_POST["fact1"])) {
  $dir = $_POST['dir'];
  $n_fact = $_POST['n_fact'];
  $id_punto = $_POST['id_punto'];
  $p_nom = $_POST['p_nom'];
  $f_fact = $_POST['f_fact'];
  $p_fact = $_POST['p_fact'];
  $doc = $_POST['doc'];
  $atrasos = $_POST['atrasos'];
  $admin_mes = $_POST['admin_mes'];
  $saldo_ant = $_POST['saldo_ant'];
  $descuento = $_POST['descuento'];
  $total_pagar = $_POST['total_pagar'];
  $user = $_SESSION['nombres']." ".$_SESSION['apellidos'];
  $ultimodia = $_POST['ultimodia'];
  $mes = $_POST['mes'];
  $matricula = $_POST['matricula'];
  $traslado = $_POST['traslado'];
  $reactivacion = $_POST['reactivacion'];
  $multa = $_POST['multa'];
  


$dompdf->loadHtml('
<link rel="stylesheet" href="prueba.css">
<div  id="codigo"></div>
   <img class="gwd-img-xvwd gwd-img-12pu" src="assets/factura_1_original (2)_4.jpg" id="factura">
  <p class="gwd-p-ppgg gwd-p-14qa" id="num_fact">'.$n_fact.'</p>
  <p class="gwd-p-16rd gwd-p-q0r4"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1xo1"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-1dj7 gwd-p-133f"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1h36"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PERIODO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-wotq"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PERIODO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-1eat"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PERIODO</span>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-huvl gwd-p-8dzf"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PERIODO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po gwd-p-1oc6" id="id_punto">'.$id_punto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht gwd-p-rv6v" id="subs">'.$p_nom.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn gwd-p-1lcy" id="fecha_fact">'.$f_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-4ge5" id="per_fact">'.$p_fact.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-i08h" id="per_fact_1">Atrasos:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-1hqo" id="per_fact_3">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-1m32" id="per_fact_4">Fecha lim. de pago:</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1bi0 gwd-p-suoa" id="per_fact_5">'.$ultimodia.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc gwd-p-156d gwd-p-1oen" id="per_fact_2">'.$atrasos.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt gwd-p-1trv" id="dir">'.$dir.'</p>
  <p class="gwd-p-16rd gwd-p-1dj7 gwd-p-uoq1"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci gwd-p-huvl gwd-p-ujhy"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PERIODO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po gwd-p-1han" id="id_punto_1">'.$id_punto.'</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht gwd-p-qjn1" id="subs_1">'.$p_nom.'</p>
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
  <p class="gwd-p-15yh gwd-p-5okj">ESTADO DE CUENTA :</p>
  <p class="gwd-p-15yh gwd-p-15u8">'.$n_fact.'</p>
  <p class="gwd-p-ph3h">TOTAL:</p>
      
      <img class="gwd-div-1crj" src="assets/'.$n_fact.'.jpg"/>
  ');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($doc);
  }


 ?><?php  ?>