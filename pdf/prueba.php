
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
  $admin_mes2 = $_POST['admin_mes2'];
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
  $vinternet = $_POST['vinternet'];
  $otros2 = 0;
  


  $dompdf->loadHtml('
    <link rel="stylesheet" href="prueba.css">
      <div class="gwd-div-11u6"></div>
  <div class="gwd-div-10g6"></div>
  <div class="gwd-div-13ji gwd-div-abpi gwd-div-m46e"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-sftf gwd-div-2cjg"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-1kld gwd-div-f6xe"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-xnfk"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-155l gwd-div-o2o2"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-155l gwd-div-6ww0 gwd-div-1qqz"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-155l gwd-div-6ww0 gwd-div-19vr"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-qfch gwd-div-6gdv"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-dtf3 gwd-div-rgio"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-bdj2 gwd-div-1vmc"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-171t gwd-div-1t64"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-11c1 gwd-div-1xy1"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-1etv gwd-div-1tth"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-1860 gwd-div-d3cw"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-19s5 gwd-div-mh8l gwd-div-1jv3"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-1j7w gwd-div-32n8"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-19s5 gwd-div-bvew"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-b0fv gwd-div-1jz2"></div>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-111c">Servicio Parabólica</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-ltsz gwd-p-r0sm">CONCEPTO</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-ltsz gwd-p-jdre gwd-p-1g2w">VALOR</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc">VALOR PERIODO</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc gwd-p-17bo">OTROS SERVICIOS</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc gwd-p-17bo gwd-p-1hwm">SALDO ANTERIOR</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc gwd-p-17bo gwd-p-1hwm gwd-p-8q25">TOTAL</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-13f6">Servicio Internet</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-5ks1">Descuento</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-117z gwd-p-14hz">Saldo Anterior</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-117z gwd-p-17o9 gwd-p-1lxw">Traslado de Punto</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-117z gwd-p-17o9 gwd-p-e6lf gwd-p-1ylt">Reconexión</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-117z gwd-p-17o9 gwd-p-e6lf gwd-p-1gcg gwd-p-12re">Multa</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-117z gwd-p-17o9 gwd-p-e6lf gwd-p-1gcg gwd-p-9l4q gwd-p-7cuk">Otros Conceptos</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-1uvj gwd-p-1109 gwd-p-117z gwd-p-17o9 gwd-p-e6lf gwd-p-1gcg gwd-p-9l4q gwd-p-86x7">TOTAL</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1ob5 gwd-p-drek gwd-p-1vrx">PERIODO COBRADO</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1ob5 gwd-p-1eej gwd-p-co74 gwd-p-157g">FECHA LIMITE DE PAGO</p>
  <div class="gwd-div-13ji gwd-div-abpi gwd-div-1hkd gwd-div-1pqy"></div>
  <p class="gwd-p-1bg0 gwd-p-1ysh gwd-p-drys">ESTADO DE CUENTA</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-18eg gwd-p-dmtp">ID PUNTO</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-phdg gwd-p-16g4">DIRECCIÓN</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1tz3 gwd-p-1k29">CIUDAD</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1ob5 gwd-p-1fuw gwd-p-plei">PERIODO COBRADO</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1ob5 gwd-p-1eej gwd-p-1bvg gwd-p-17ps">FECHA LIMITE DE PAGO</p>
  <p class="gwd-p-1hmp"><span class="gwd-span-xcub">No Cuenta</span><br>
    
  </p>
  <p class="gwd-p-1hmp gwd-p-1pnr"><span class="gwd-span-xcub">No Cuenta</span><br>
    
  </p>
  <div class="gwd-div-13ji gwd-div-abpi gwd-div-q82p gwd-div-17yg gwd-div-usgi gwd-div-1bbg"></div>
  <div class="gwd-div-13ji gwd-div-abpi gwd-div-q82p gwd-div-17yg gwd-div-wk6u gwd-div-h02e"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-1kld gwd-div-6kls"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-xnfk"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-155l gwd-div-o2o2"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-155l gwd-div-6ww0 gwd-div-1qqz"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-17l9 gwd-div-nfu6 gwd-div-qw55 gwd-div-155l gwd-div-6ww0 gwd-div-19vr"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-qfch gwd-div-1mn1"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-dtf3 gwd-div-d0vr"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-bdj2 gwd-div-1nn1"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-171t gwd-div-1vr8"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-11c1 gwd-div-1845"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-19s5 gwd-div-mh8l gwd-div-le0p"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-1j7w"></div>
  <div class="gwd-div-13ji gwd-div-i2uf gwd-div-171p gwd-div-xqyq gwd-div-1s9l gwd-div-jnr9 gwd-div-1vwf gwd-div-1sym gwd-div-1ouo gwd-div-ea9a gwd-div-19s5 gwd-div-bvew"></div>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-m9gf">ESTADO DE CUENTA</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-ltsz gwd-p-j4dq">CONCEPTO</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-ltsz gwd-p-jdre gwd-p-tvr9">VALOR</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc">VALOR PERIODO</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc gwd-p-17bo">OTROS SERVICIOS</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc gwd-p-17bo gwd-p-1hwm">SALDO ANTERIOR</p>
  <p class="gwd-p-1bg0 gwd-p-njk3 gwd-p-cfqv gwd-p-qtxc gwd-p-17bo gwd-p-1hwm gwd-p-8q25">TOTAL</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-f9ia gwd-p-1nmh">ID PUNTO</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-wm62 gwd-p-1vl9">DIRECCIÓN</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1wcd gwd-p-eiwb">CIUDAD</p>
  <p class="gwd-p-1bg0 gwd-p-1ysh gwd-p-zxpb">ESTADO DE CUENTA</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-18eg gwd-p-819i">ID PUNTO</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-phdg gwd-p-i7ju">DIRECCIÓN</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1tz3 gwd-p-117v">CIUDAD</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1ob5 gwd-p-1fuw gwd-p-l0q0">PERIODO COBRADO</p>
  <p class="gwd-p-1bg0 gwd-p-twlh gwd-p-9ege gwd-p-10x8 gwd-p-1ob5 gwd-p-1eej gwd-p-1bvg gwd-p-aze6">FECHA LIMITE DE PAGO</p>
  <p class="gwd-p-1hmp gwd-p-x1mb"><span class="gwd-span-xcub">No Cuenta</span><br>
    
  </p>
  <p class="gwd-p-1hmp gwd-p-1pnr gwd-p-75zv"><span class="gwd-span-xcub">No Cuenta</span><br>
    
  </p>
  <p class="gwd-p-10s9 gwd-p-13wj gwd-p-1w88 text-tool-feedback" id="num_cuenta">'.$n_fact.'</p>
  <p class="gwd-p-10s9 gwd-p-13wj gwd-p-lot3 text-tool-feedback" id="num_cuenta_1">'.$n_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-1yuh gwd-p-18rr text-tool-feedback" id="num_cc">'.$doc.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-ki1i gwd-p-1ts8 text-tool-feedback" id="nombre">'.$p_nom.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-swx0 gwd-p-dyqc text-tool-feedback" id="ID_PUNTO">'.$id_punto.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-omm1 gwd-p-1c9y text-tool-feedback" id="DIRECCION">'.$dir.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-1jeq gwd-p-kkcw text-tool-feedback" id="DIRECCION_1">MOGOTES - SANTANDER</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-znu2 gwd-p-vsjq text-tool-feedback" id="PERIODO">'.$p_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-uy95 gwd-p-1wj9 text-tool-feedback" id="LIMITE_PAGO">'.$ultimodia.'</p>
  <p class="gwd-p-b0d8 gwd-p-1yuh gwd-p-1v8m text-tool-feedback" id="num_cc_1">'.$doc.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-ki1i gwd-p-12im text-tool-feedback" id="nombre_1">'.$p_nom.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-swx0 gwd-p-ucgl text-tool-feedback" id="ID_PUNTO_1">'.$id_punto.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-omm1 gwd-p-ly9f text-tool-feedback" id="DIRECCION_2">'.$dir.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-1jeq gwd-p-o1f3 text-tool-feedback" id="DIRECCION_3">MOGOTES - SANTANDER</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-znu2 gwd-p-18r8 text-tool-feedback" id="PERIODO_1">'.$p_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-uy95 gwd-p-omce text-tool-feedback" id="LIMITE_PAGO_1">'.$ultimodia.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-z68v text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-4sl3 text-tool-feedback" id="SER_PARA">'.$admin_mes.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-1dvk text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-fp76 text-tool-feedback" id="SER_PARA_1">'.$admin_mes2.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-1yu7 text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-1quq text-tool-feedback" id="OTROS2">'.$otros2.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gf4t text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-1lm2 text-tool-feedback" id="SALD_ANTER2">'.$saldo_ant.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gb7b text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-z17a text-tool-feedback" id="SER_PARA_4">'.$total_pagar.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-19dw text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-1ksx text-tool-feedback" id="SER_INTER">'.$vinternet.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-1yfb text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-1rhh text-tool-feedback" id="DESCUENTO">'.$descuento.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1l16 text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-1mmd text-tool-feedback" id="SALD_ANTER">'.$saldo_ant.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-7ryv text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1rsa text-tool-feedback" id="TRAS_PUNTO">'.$traslado.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-juxz text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-14by text-tool-feedback" id="RECONEXION">'.$reactivacion.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1k65 text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-11xs text-tool-feedback" id="MULTA">'.$multa.'</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1j9q gwd-p-goi7 text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-1tbk text-tool-feedback" id="OTROS">0</p>
  <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-1gay gwd-p-tsh9 gwd-p-1cgk gwd-p-1h0q gwd-p-1ekb gwd-p-1j9q gwd-p-ake8 text-tool-feedback">$</p>
  <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-708o text-tool-feedback" id="TOTAL">'.$total_pagar.'</p>
  <img class="gwd-div-1crj" id="CODIGO" src="assets/'.$n_fact.'.jpg">
  <img class="gwd-img-2evw gwd-img-i2p2" src="img/logo_1.PNG">
  <img class="gwd-img-1947 gwd-img-1tma" src="img/asopamo.png">
  <img class="gwd-img-2evw gwd-img-p485" src="img/logo_1.PNG">
  <img class="gwd-img-1947 gwd-img-876s" src="img/asopamo.png">
  <img class="gwd-img-1dbl" src="img/firma.PNG">
  <p class="gwd-p-1dly gwd-p-flx4 gwd-p-idja gwd-p-5xxo text-tool-feedback" id="text"><span class="gwd-span-1mdj">P<span class="gwd-span-u2wc">ara PQR diríjase a la oficina o a través del correo electrónico&nbsp;</span></span><span class="gwd-span-10qz"><span class="gwd-span-1elw">asopamo@yahoo.es</span> o comuníquese telefónicamente con&nbsp;
    </span><span class="gwd-span-1kam">a la línea, 315 882 7273. En caso de presentar reclamación con este estado de cuenta, diríjase a la oficina antes de la fecha límite de pago.</span></p>
  <div><br>
    
  </div>
  <p class="gwd-p-frrh text-tool-feedback"><span class="gwd-span-wcg1">Pague su cuenta a tiempo, evitese la suspención de los servicios y un cargo de reconexión de $ 5,000</span><br>
    
  </p>
  <p class="gwd-p-hfq1 text-tool-feedback"><span class="gwd-span-55sn">Representante Legal: Jeisson Andrey Pinto Pinto<br></span><span class="gwd-span-1oe0">Coordinadora Oficina: Diana Lisseth Alfonso Ríos</span></p>
  <div><br>
    
  </div>
  <p class="gwd-p-hp50 gwd-p-p746 text-tool-feedback"><span class="gwd-span-5buu">NIT. 804008685<br></span><span class="gwd-span-tski">Lic. Min Tic 2019 - 2029. Entidad sin Ánimo de Lucro<br></span><span class="gwd-span-1h4u">Dirección: Calle 6 No 8 - 51, Mogotes (S) Teléfono: 315 882 7273</span></p>
  <div class="gwd-div-1gx6 text-tool-feedback">NIT. 804008685<br>
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
    <img class="gwd-img-ztg9" src="img/factura5.PNG" id="FACTURA2">
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
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-fp76" id="SER_PARA_1">150.000</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-1yu7">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-1quq" id="OTROS2">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gf4t">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-1lm2" id="SALD_ANTER2">0</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1hqq gwd-p-ised gwd-p-a7vw gwd-p-gb7b">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1u5p gwd-p-5hed gwd-p-3htt gwd-p-3xws gwd-p-z17a" id="SER_PARA_4">150.000</p>
    <p class="gwd-p-2i7j gwd-p-8lhm gwd-p-1u4p gwd-p-19dw">$</p>
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-1ksx" id="SER_INTER">150.000</p>
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
    <p class="gwd-p-2i7j gwd-p-1u0r gwd-p-1yia gwd-p-8cj0 gwd-p-ccgb gwd-p-ss2v gwd-p-1b3y gwd-p-1qk7 gwd-p-4iew gwd-p-708o" id="TOTAL">150.000</p>
    <img class="gwd-div-1crj" id="CODIGO" src="assets/'.$n_fact.'.jpg"/>
    <img class="gwd-img-2evw gwd-img-i2p2" src="img/logo_1.PNG">
    <img class="gwd-img-1947 gwd-img-1tma" src="img/asopamo.png">
    <img class="gwd-img-2evw gwd-img-p485" src="img/logo_1.PNG">
    <img class="gwd-img-1947 gwd-img-876s" src="img/asopamo.png">
    <img class="gwd-img-1dbl" src="img/firma.PNG">
    <p class="gwd-p-1dly gwd-p-flx4 gwd-p-idja gwd-p-5xxo" id="text"><span class="gwd-span-1mdj">P<span class="gwd-span-u2wc">ara PQR diríjase a la oficina o a través del correo electrónico&nbsp;</span></span><span class="gwd-span-10qz"><span class="gwd-span-1elw">asopamo@yahoo.es</span> o comuníquese telefónicamente con&nbsp;</span><span class="gwd-span-1kam">a la línea, 315 882 7273. En caso de presentar reclamación con este estado de cuenta, diríjase a la oficina antes de la fecha límite de pago.</span></p>
    <div><br>
    
    </div>
    <p class="gwd-p-frrh"><span class="gwd-span-wcg1">Pague su cuenta a tiempo, evitese la suspención de los servicios y un cargo de reconexión de $ 5,000</span><br>
    
    </p>
    <p class="gwd-p-hfq1"><span class="gwd-span-55sn">Representante Legal: Jeisson Andrey Pinto Pinto<br></span><span class="gwd-span-1oe0">Coordinadora Oficina: Diana Lisseth Alfonso Ríos</span></p>
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