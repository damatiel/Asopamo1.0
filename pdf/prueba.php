
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
  $admin_mes1 = $_POST['admin_mes1'];
  


$dompdf->loadHtml('
  <link rel="stylesheet" href="prueba.css">
    <div  id="codigo"></div>
<img class="gwd-img-ztg9" src="assets/factura3.PNG" id="FACTURA2">
  <p class="gwd-p-10s9 gwd-p-1wd9 gwd-p-14u2">No Cuenta</p>
  <p class="gwd-p-10s9 gwd-p-13wj gwd-p-1w88" id="num_cuenta">'.$n_fact.'</p>
  <p class="gwd-p-10s9 gwd-p-1wd9 gwd-p-sn7x">No Cuenta</p>
  <p class="gwd-p-10s9 gwd-p-13wj gwd-p-lot3" id="num_cuenta_1">'.$n_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-1yuh gwd-p-18rr" id="num_cc">'.$doc.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-ki1i gwd-p-1ts8" id="nombre">'.$p_nom.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-swx0 gwd-p-dyqc" id="ID_PUNTO">'.$id_punto.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-omm1 gwd-p-1c9y" id="DIRECCION">'.$dir.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-1jeq gwd-p-kkcw" id="DIRECCION_1">MOGOTES - SANTANDER</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-znu2 gwd-p-vsjq" id="PERIODO">'.$p_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-uy95 gwd-p-1wj9" id="LIMITE_PAGO">'.$ultimodia.'</p>
  <p class="gwd-p-b0d8 gwd-p-1yuh gwd-p-1v8m" id="num_cc_1">'.$doc.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-ki1i gwd-p-12im" id="nombre_1">'.$p_nom.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-swx0 gwd-p-ucgl" id="ID_PUNTO_1">'.$id_punto.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-omm1 gwd-p-ly9f" id="DIRECCION_2">'.$dir.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-1jeq gwd-p-o1f3" id="DIRECCION_3">MOGOTES - SANTANDER</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-znu2 gwd-p-18r8" id="PERIODO_1">'.$p_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-uy95 gwd-p-omce" id="LIMITE_PAGO_1">'.$ultimodia.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-z68v">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-4sl3" id="SER_PARA">'.$admin_mes.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-1dvk">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-fp76" id="SER_PARA_1">'.$admin_mes.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-1yu7">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-1quq" id="OTROS2">0</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gf4t">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-1lm2" id="SALD_ANTER2">'.$saldo_ant.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gb7b">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-z17a" id="SER_PARA_4">'.$total_pagar.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-19dw">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-1ksx" id="SER_INTER">0</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-1yfb">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-1rhh" id="DESCUENTO">'.$descuento.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1l16">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-1mmd" id="SALD_ANTER">'.$saldo_ant.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-7ryv">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1rsa" id="TRAS_PUNTO">'.$traslado.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-juxz">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-14by" id="RECONEXION">'.$reactivacion.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1k65">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-11xs" id="MULTA">'.$multa.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1j9q gwd-p-goi7">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-1tbk" id="OTROS">0</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1j9q gwd-p-ake8">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-708o" id="TOTAL">'.$total_pagar.'</p>
      <img class="gwd-div-jqdd" id="CODIGO" src="assets/'.$n_fact.'.jpg"/>
      <div class="gwd-div-gwpe"></div>
  <img class="gwd-img-2evw gwd-img-i2p2" src="assets/logo_1.PNG">
  <img class="gwd-img-1947 gwd-img-1tma" src="assets/asopamo.png">
  <div class="gwd-div-radq gwd-div-1jlq"></div>
  <div class="gwd-div-radq gwd-div-1n1n"></div>
  <img class="gwd-img-2evw gwd-img-p485" src="assets/logo_1.PNG">
  <img class="gwd-img-1947 gwd-img-876s" src="assets/asopamo.png">
  ');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($doc);
  }
if (isset($_POST["fact_inter"])) {
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
  $inter = $_POST['inter'];

$dompdf->loadHtml('
<link rel="stylesheet" href="prueba_ant.css">
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
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-1wga">Instalación y Router</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-7vjl">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1o0l">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-pl9h">100.000</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-ibug">100.000</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1hvk gwd-p-5car">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-q6vc gwd-p-kmkt">100.000</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-10z0 gwd-p-1hvk gwd-p-1vib">$</p>
  <p class="gwd-p-d236 gwd-p-1g7m gwd-p-5wlg gwd-p-4uv1 gwd-p-hx35 gwd-p-q6vc gwd-p-1wb3">100.000</p>
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