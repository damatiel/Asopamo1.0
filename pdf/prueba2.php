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
      $vinternet = $fila[17];

    $query2 = "SELECT * FROM puntos WHERE id = '$id_punto'";
  $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta suscriptores");
    if ($fila2 = mysqli_fetch_array($query_exec2)) {
      $internet = $fila2['internet'];
      $admin_mes1 = "Administración del mes";
      if ($internet > 0) {
        $admin_mes = $admin_mes + $vinternet;
        $admin_mes1 = "Admin mes e Internet";
      }
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
    $otros2= $descuento + $traslado + $reactivacion + $multa;
    $html.='
  <img class="gwd-img-ztg9" src="assets/factura5.PNG" id="FACTURA2">
  <p class="gwd-p-10s9 gwd-p-1wd9 gwd-p-14u2">No Cuenta</p>
  <p class="gwd-p-10s9 gwd-p-13wj gwd-p-1w88" id="num_cuenta">'.$n_fact.'</p>
  <p class="gwd-p-10s9 gwd-p-1wd9 gwd-p-sn7x">No Cuenta</p>
  <p class="gwd-p-10s9 gwd-p-13wj gwd-p-lot3" id="num_cuenta_1">'.$n_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-1yuh gwd-p-18rr" id="num_cc">'.$doc.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-ki1i gwd-p-1ts8" id="nombre">'.$nomCompleto.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-swx0 gwd-p-dyqc" id="ID_PUNTO">'.$id_punto.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-omm1 gwd-p-1c9y" id="DIRECCION">'.$dir.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-1jeq gwd-p-kkcw" id="DIRECCION_1">MOGOTES - SANTANDER</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-znu2 gwd-p-vsjq" id="PERIODO">'.$p_fact.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-1qao gwd-p-lsdz gwd-p-zabr gwd-p-l5rv gwd-p-uy95 gwd-p-1wj9" id="LIMITE_PAGO">'.$ultimodia.'</p>
  <p class="gwd-p-b0d8 gwd-p-1yuh gwd-p-1v8m" id="num_cc_1">'.$doc.'</p>
  <p class="gwd-p-b0d8 gwd-p-5s47 gwd-p-ki1i gwd-p-12im" id="nombre_1">'.$nomCompleto.'</p>
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
    Dirección: Calle 6 No 8 - 51, Mogotes (S) Teléfono: 315 882 7273</div>';
      
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
  if ($mes == 3) {
    $mes = 'Marzo';
  }
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
    $query = "SELECT * FROM facturacion WHERE periodo_fact = '$mes'";
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
