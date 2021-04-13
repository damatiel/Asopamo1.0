
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
  $vinternet =0;
  $otros2 = 0;
  


  $dompdf->loadHtml('
    <link rel="stylesheet" href="prueba.css">
    <div  id="codigo"></div>
    <img class="gwd-img-ztg9" src="assets/factura5.PNG" id="FACTURA2">
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
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-1quq" id="OTROS2">'.$otros2.'</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gf4t">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-1lm2" id="SALD_ANTER2">'.$saldo_ant.'</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gb7b">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-z17a" id="SER_PARA_4">'.$total_pagar.'</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-19dw">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-1ksx" id="SER_INTER">'.$vinternet.'</p>
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
    <img class="gwd-div-1crj" id="CODIGO" src="assets/'.$n_fact.'.jpg"/>
    <img class="gwd-img-2evw gwd-img-i2p2" src="assets/logo_1.PNG">
    <img class="gwd-img-1947 gwd-img-1tma" src="assets/asopamo.png">
    <img class="gwd-img-2evw gwd-img-p485" src="assets/logo_1.PNG">
    <img class="gwd-img-1947 gwd-img-876s" src="assets/asopamo.png">
    <img class="gwd-img-1dbl" src="assets/firma.PNG">
    <p class="gwd-p-1dly gwd-p-flx4 gwd-p-idja gwd-p-5xxo" id="text"><span class="gwd-span-1mdj">P<span class="gwd-span-u2wc">ara PQR diríjase a la oficina o a través del correo electrónico&nbsp;</span></span><span class="gwd-span-10qz"><span class="gwd-span-1elw">asopamo@yahoo.es</span> o comuníquese telefónicamente con&nbsp;</span><span class="gwd-span-1kam">a la línea, 315 882 7273. En caso de presentar reclamación con este estado de cuenta, diríjase a la oficina antes de la fecha límite de pago.</span></p>
    <div><br>
    
    </div>
    <p class="gwd-p-frrh"><span class="gwd-span-wcg1">Pague su cuenta a tiempo, evitese la suspención de los servicios y un cargo de reconexión de $ 5,000</span><br>
    
    </p>
    <p class="gwd-p-hfq1"><span class="gwd-span-55sn">Representante Legal: Jeisson Andrey Pinto Pinto<br></span><span class="gwd-span-1oe0">Operador: Diana Lisseth Alfonso Ríos</span></p>
    <div><br>
    
    </div>
    <p class="gwd-p-hp50 gwd-p-p746"><span class="gwd-span-5buu">NIT. 804008685<br></span><span class="gwd-span-tski">Lic. Min Tic 2019 - 2029. Entidad sin Ánimo de Lucro<br></span><span class="gwd-span-1h4u">Dirección: Calle 6 No 8 - 51, Mogotes (S) Teléfono: 315 882 7273</span></p>
    <div class="gwd-div-1gx6">NIT. 804008685<br>
    Lic. Min Tic 2019 - 2029. Entidad sin Ánimo de Lucro<br>
    Dirección: Calle 6 No 8 - 51, Mogotes (S) Teléfono: 315 882 7273</div>
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
    <link rel="stylesheet" href="prueba.css">
    <div  id="codigo"></div>
    <img class="gwd-img-ztg9" src="assets/factura5.PNG" id="FACTURA2">
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
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-4sl3" id="SER_PARA">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-1dvk">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-fp76" id="SER_PARA_1">100.000</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-1yu7">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-1quq" id="OTROS2">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gf4t">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-1lm2" id="SALD_ANTER2">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gb7b">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-z17a" id="SER_PARA_4">100.000</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-19dw">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-1ksx" id="SER_INTER">100.000</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-1yfb">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-1rhh" id="DESCUENTO">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1l16">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-1mmd" id="SALD_ANTER">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-7ryv">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1rsa" id="TRAS_PUNTO">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-juxz">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-14by" id="RECONEXION">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1k65">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-11xs" id="MULTA">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1j9q gwd-p-goi7">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-1tbk" id="OTROS">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1j9q gwd-p-ake8">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-708o" id="TOTAL">100.000</p>
    <img class="gwd-div-1crj" id="CODIGO" src="assets/'.$n_fact.'.jpg"/>
    <img class="gwd-img-2evw gwd-img-i2p2" src="assets/logo_1.PNG">
    <img class="gwd-img-1947 gwd-img-1tma" src="assets/asopamo.png">
    <img class="gwd-img-2evw gwd-img-p485" src="assets/logo_1.PNG">
    <img class="gwd-img-1947 gwd-img-876s" src="assets/asopamo.png">
    <img class="gwd-img-1dbl" src="assets/firma.PNG">
    <p class="gwd-p-1dly gwd-p-flx4 gwd-p-idja gwd-p-5xxo" id="text"><span class="gwd-span-1mdj">P<span class="gwd-span-u2wc">ara PQR diríjase a la oficina o a través del correo electrónico&nbsp;</span></span><span class="gwd-span-10qz"><span class="gwd-span-1elw">asopamo@yahoo.es</span> o comuníquese telefónicamente con&nbsp;</span><span class="gwd-span-1kam">a la línea, 315 882 7273. En caso de presentar reclamación con este estado de cuenta, diríjase a la oficina antes de la fecha límite de pago.</span></p>
    <div><br>
    
    </div>
    <p class="gwd-p-frrh"><span class="gwd-span-wcg1">Pague su cuenta a tiempo, evitese la suspención de los servicios y un cargo de reconexión de $ 5,000</span><br>
    
    </p>
    <p class="gwd-p-hfq1"><span class="gwd-span-55sn">Representante Legal: Jeisson Andrey Pinto Pinto<br></span><span class="gwd-span-1oe0">Operador: Diana Lisseth Alfonso Ríos</span></p>
    <div><br>
    
    </div>
    <p class="gwd-p-hp50 gwd-p-p746"><span class="gwd-span-5buu">NIT. 804008685<br></span><span class="gwd-span-tski">Lic. Min Tic 2019 - 2029. Entidad sin Ánimo de Lucro<br></span><span class="gwd-span-1h4u">Dirección: Calle 6 No 8 - 51, Mogotes (S) Teléfono: 315 882 7273</span></p>
    <div class="gwd-div-1gx6">NIT. 804008685<br>
    Lic. Min Tic 2019 - 2029. Entidad sin Ánimo de Lucro<br>
    Dirección: Calle 6 No 8 - 51, Mogotes (S) Teléfono: 315 882 7273</div>
    ');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($doc);
}

?><?php  ?>