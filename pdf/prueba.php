
<?php  
  require_once __DIR__ . '/../php/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.html"); 
}
                  echo '<img src="barcode.php?filepath=assets/123456.jpg&codetype=Code39&size=100&text=hola"/>';
                  
?>

<?php 
// incluye el cargador automático 
require_once 'autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;


// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml('
	
<link rel="stylesheet" href="prueba.css">
<div  id="codigo"></div>

	<img class="gwd-img-xvwd gwd-img-12pu" src="assets/factura_1_original (1).jpg" id="factura">
  <img class="gwd-img-xvwd gwd-img-1pzk" src="assets/factura_1_original (1).jpg" id="factura_1">
  <p class="gwd-p-ppgg gwd-p-14qa" id="num_fact">001</p>
  <p class="gwd-p-ppgg gwd-p-1hiz" id="num_fact_1">001</p>
  <p class="gwd-p-16rd"><strong class="gwd-strong-ikfz">ID.PUNTO:<br>SUBSCRIPTOR:<br>FECHA FACTURA</strong>:</p>
  <p class="gwd-p-16rd gwd-p-w8tp gwd-p-wrci"><strong class="gwd-strong-ikfz">DIRECCION:<br><br></strong><span class="gwd-span-14q3">PARIODO FACTURADO</span>:</p>
  <p class="gwd-p-1mkd gwd-p-x0po" id="id_punto">001</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-16ht" id="subs">MIGUEL ANGEL MEJIA</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-1hbn" id="fecha_fact">05/05/2020</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-19xc" id="per_fact">MAYO</p>
  <p class="gwd-p-1mkd gwd-p-2oua gwd-p-1l8l gwd-p-6s9a gwd-p-1swt" id="dir">KR 18 # 19 - 44</p>
  
  <img class="gwd-div-1crj" src="assets/1234567.jpg"/>
  ');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
 ?>