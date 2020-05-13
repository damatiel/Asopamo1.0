
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
  

$dompdf->loadHtml('
  
<link rel="stylesheet" href="prueba.css">
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
  
  <img class="gwd-div-1crj" src="assets/'.$doc.'.jpg"/>
  ');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
  }
  if (isset($_POST["fact2"])) {
    $mes = $_POST['mes'];
  $query = "SELECT * FROM facturacion WHERE id_mes = '$mes'";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta facturacion");
  while ($fila = mysqli_fetch_array($query_exec)) {
    $n_fact = $fila[0];
    $id_punto = $fila[1];
    $doc = $fila[2];
    $f_fact = $fila[3];
    $p_fact = $fila[4];

    $query3 = "SELECT * FROM suscriptores WHERE doc = '$doc'";
  $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta suscriptores");
    if ($fila3 = mysqli_fetch_array($query_exec3)) {
      $p_nom = $fila3[1];
$dompdf->loadHtml('
  
<link rel="stylesheet" href="prueba.css">
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
  
  <img class="gwd-div-1crj" src="assets/'.$n_fact.'.jpg"/>
  ');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
}}
  }

 ?>