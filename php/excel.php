  <?php  
  require_once __DIR__ . '/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
      //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.php"); 
  }
  ?>
  <?php 
  if (isset($_POST["excel_puntos"])) {
    header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
    header('Content-Disposition: attachment; filename=Puntos.xls');
    ?>
    <table>
      <tr>
        <th scope="col" class="text-center">ID Punto</th>
        <th scope="col" class="text-center">Documento</th>
        <th scope="col" class="text-center">Nombre</th>
        <th scope="col" class="text-center">Apellido</th>
        <th scope="col" class="text-center">Estado</th>
        <th scope="col" class="text-center">Direccion</th>
      </tr>
      <?php 
      $query = "SELECT * FROM puntos";
      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
      while($fila = mysqli_fetch_array($query_exec)){ 
        $docGeneral = $fila[3];
        $query2 = "SELECT * FROM suscriptores WHERE doc = '$docGeneral'";
        $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
        $fila2 = mysqli_fetch_array($query_exec2);
        ?>
        
        <tr>
          <td class="text-center"><?php echo $fila[0]; ?></td>
          <td class="text-center"><?php echo $fila[3]; ?></td>
          <td class="text-center"><?php echo $fila2[1]; ?></td>
          <td class="text-center"><?php echo $fila2[3]; ?></td>
          <?php 
          $estado = $fila[2];
          if($estado == 2){?>
           <td class="text-center"><?php echo "Activo"; ?></td>
         <?php } elseif($estado == 1){ ?>
          <td class="text-center"><?php echo "Deudor"; ?></td>
        <?php } elseif($estado == 3){ ?>
          <td class="text-center"><?php echo "Bloqueado por Mora"; ?></td>
        <?php } elseif($estado == 4){ ?>
          <td class="text-center"><?php echo "Bloqueado"; ?></td>
        <?php } elseif ($estado == 5) {?>
          <td class="text-center"><?php echo "Bloqueado Especial"; ?></td>
        <?php } ?>
        <td class="text-center"><?php echo $fila[1].' '.$fila['indicaciones']; ?></td>
      </tr>
    <?php } ?>
  </table>
  <?php
}
if (isset($_POST["excel_sus"])) {
  header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
  header('Content-Disposition: attachment; filename=Suscriptores.xls');
  ?>
  <table>
    <tr>
      <th scope="col" class="text-center">Documento</th>
      <th scope="col" class="text-center">Nombre</th>
      <th scope="col" class="text-center">Apellido</th>
      <th scope="col" class="text-center">Estado</th>
      <th scope="col" class="text-center">Contacto</th>
      <th scope="col" class="text-center">Direccion</th>
    </tr>
    <?php 
    $query = "SELECT * FROM suscriptores";
    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
    while($fila = mysqli_fetch_array($query_exec)){ ?>
      <tr>
        <td class="text-center"><?php echo $fila[0]; ?></td>
        <td class="text-center"><?php echo $fila[1]; ?></td>
        <td class="text-center"><?php echo $fila[3]; ?></td>
        <?php 
        $estado = $fila[5];
        if($estado == 1){?>
         <td class="text-center"><?php echo "Activo"; ?></td>
       <?php } else{ ?>
        <td class="text-center"><?php echo "Cancelado"; ?></td>
      <?php } ?>
      
      <td class="text-center"><?php echo $fila[6]; ?></td>
      <td class="text-center"><?php echo $fila[7]; ?></td>
    </tr>
  <?php } ?>
</table>
<?php
}
if (isset($_POST["excel_recaudos"])) {
  $idPunto = "";
  $numRecaudos = 0;
  $TServicios = 0;
  $TSaldo = 0;
  $TMultas = 0;
  $TTraslados = 0;
  $TReactivacion = 0;
  $TMatricula = 0;
  $TDescuento = 0;
  $TTotal = 0;
  $fecha_ini = $_POST['fecha_ini'];
  $fecha_fin = $_POST['fecha_fin'];
  $idEntidad = $_POST['idEntidad'];
  if ($idEntidad == 1) {
   $idEntidad1 = "Asopamo";
 }elseif ($idEntidad == 2) {
   $idEntidad1 = "Servimcoop";
 }elseif ($idEntidad == 3) {
   $idEntidad1 = "Banco Agrario";
 }else{
   $idEntidad1 = "Todo";
 }
 header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
 header('Content-Disposition: attachment; filename=Recaudo  '.$idEntidad1.' '.$fecha_ini.' - '.$fecha_fin.'.xls');
 ?>
 <table>
  <tr>
    <th class="text-center" scope="col">Punto</th>
    <th class="text-center" scope="col">Direccion</th>
    <th class="text-center" scope="col">FacNro</th>
    <th class="text-center" scope="col">Servicio</th>
    <th class="text-center" scope="col">Atrasos</th>
    <th class="text-center" scope="col">Sald Ant</th>
    <th class="text-center" scope="col">Multa Mora</th>
    <th class="text-center" scope="col">Traslado</th>
    <th class="text-center" scope="col">Reactivacion</th>
    <th class="text-center" scope="col">Cuota Mat</th>
    <th class="text-center" scope="col">Descuento</th>
    <th class="text-center" scope="col">Total</th>
    <th class="text-center" scope="col">Fec Pago</th>
    <th class="text-center" scope="col">Periodo</th>
    <th class="text-center" scope="col">Entidad</th>
  </tr>
  <?php
  
  if ($idEntidad == "todos") {
    $query = "SELECT * FROM pagos WHERE fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin'";
  }else{
    $query = "SELECT * FROM pagos WHERE id_entPago = $idEntidad AND fecha_pago BETWEEN '$fecha_ini' AND '$fecha_fin'";
  }
  
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
  while($fila1 = mysqli_fetch_array($query_exec)){
    $idEntPago = $fila1['id_entPago'];
    $Numfactura = $fila1['num_factura'];
    $query2 = "SELECT * FROM ent_pago WHERE id = $idEntPago";
    $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
    $fila2 = mysqli_fetch_array($query_exec2);
    $numRecaudos ++;
    $TServicios += $fila1[11];;
    $TSaldo += $fila1[12];
    $TMultas += $fila1[20];
    $TTraslados += $fila1[14];
    $TReactivacion += $fila1[15];
    $TMatricula += $fila1[16];;
    $TDescuento += $fila1[13];
    $TTotal += $fila1[17];
    
    ?>

    <tr>
     <td class="text-center"><?php echo $fila1[2]; ?></td>
     <td class="text-center"><?php echo $fila1[9]; ?></td>
     <td class="text-center"><?php echo $fila1[1]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[11]; ?></td>
     <td class="text-center"><?php echo $fila1[5]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[12]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[20]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[14]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[15]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[16]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[13]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[17]; ?></td>
     <td class="text-center"><?php echo "$".$fila1[4]; ?></td>
     <td class="text-center"><?php echo $fila1[10]; ?></td>
     <td class="text-center"><?php echo $fila2[1]; ?></td>
   </tr>
 <?php } ?>
 
</table>

<br>
<div>
  <h2 class="titulo text-center container">Totalidad Recaudos</h2>
</div>
<footer>
  <div>
    <table>
      <thead>
        <tr>
          <th class="text-center" scope="col">Numero Recaudos</th>
          <th class="text-center" scope="col">Total Servicios</th>
          <th class="text-center" scope="col">Total SaldoAnt</th>
          <th class="text-center" scope="col">Total Multas</th>
          <th class="text-center" scope="col">Total Traslados</th>
          <th class="text-center" scope="col">Total Reactivacion</th>
          <th class="text-center" scope="col">Total Matricula</th>
          <th class="text-center" scope="col">Total Descuento</th>
          <th class="text-center" scope="col">Suma Total</th>
        </tr>
      </thead>
      <tbody>
        <td class="text-center"><?php echo $numRecaudos; ?></td>
        <td class="text-center"><?php echo "$".$TServicios; ?></td>
        <td class="text-center"><?php echo "$".$TSaldo; ?></td>
        <td class="text-center"><?php echo "$".$TMultas; ?></td>
        <td class="text-center"><?php echo "$".$TTraslados; ?></td>
        <td class="text-center"><?php echo "$".$TReactivacion; ?></td>
        <td class="text-center"><?php echo "$".$TMatricula; ?></td>
        <td class="text-center"><?php echo "$".$TDescuento; ?></td>
        <td class="text-center"><?php echo "$".$TTotal; ?></td>
      </tbody>
    </table>
    <?php
  }
  ?>

  <?php
  if (isset($_POST["excel_deudas"])) {
    header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
    header('Content-Disposition: attachment; filename=Deudas.xls');
    $idEstado = $_POST['idEstado'];
    ?>
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th class="text-center" scope="col">Punto</th>
          <th class="text-center" scope="col">Direccion</th>
          <th class="text-center" scope="col">Documento</th>
          <th class="text-center" scope="col">Nombre</th>
          <th class="text-center" scope="col">Fecha Ult Pago</th>
          <th class="text-center" scope="col">Atrasos</th>
          <th class="text-center" scope="col">Estado</th>
          <th class="text-center" scope="col">Deuda</th>
        </tr>
      </thead>
      <tbody >
        <?php
        $query = "SELECT * FROM pagos";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
        while($fila1 = mysqli_fetch_array($query_exec)){
          $idPunto =$fila1[2];
          if ($idEstado == "todos") {
            $query2 = "SELECT * FROM puntos WHERE id = $idPunto";
            $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
            $fila2 = mysqli_fetch_array($query_exec2);
          }else{
            $query2 = "SELECT * FROM puntos WHERE estado = $idEstado AND id = $idPunto";
            $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
            $fila2 = mysqli_fetch_array($query_exec2);
          }
          ?>
          
          <tr>
            <td class="text-center"><?php echo $fila1[0]; ?></td>
            <td class="text-center"><?php echo $fila2[1]; ?></td>
            <td class="text-center"><?php echo $fila2[3]; ?></td>
            <td class="text-center"><?php echo $fila1[7]; ?></td>
            <td class="text-center"><?php echo $fila1[4]; ?></td>
            <td class="text-center"><?php echo $fila2[5]; ?></td>
            <?php
            switch ($fila2[2]) {
              case 1:
              ?> <td class="text-center">Con Mora</td><?php
              break;
              case 2:
              ?> <td class="text-center">Al Dia</td><?php
              break;
              case 3:
              ?> <td class="text-center">Bloqueado</td><?php
              break;
              case 4:
              ?> <td class="text-center">Suspendido</td><?php
              break;  
              case 5:
              ?> <td class="text-center">Bloqueado Especial</td><?php
              break; 
            }
            ?>
            
            <td class="text-center"><?php echo $fila2[4]; ?></td>
          </tr>
        <?php }
        
        ?>
      </tbody>
      
    </table>
  <?php }
  if (isset($_POST["excel_internet"])) {
    header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
    header('Content-Disposition: attachment; filename=Puntos.xls');
    ?>
    <table>
      <tr>
        <th scope="col" class="text-center">ID Punto</th>
        <th scope="col" class="text-center">Documento</th>
        <th scope="col" class="text-center">Nombre</th>
        <th scope="col" class="text-center">Apellido</th>
        <th scope="col" class="text-center">Estado</th>
        <th scope="col" class="text-center">Direccion</th>
      </tr>
      <?php 
      $query = "SELECT * FROM puntos WHERE internet > 0";
      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
      while($fila = mysqli_fetch_array($query_exec)){ 
        $docGeneral = $fila[3];
        $query2 = "SELECT * FROM suscriptores WHERE doc = '$docGeneral'";
        $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
        $fila2 = mysqli_fetch_array($query_exec2);
        ?>
        
        <tr>
          <td class="text-center"><?php echo $fila[0]; ?></td>
          <td class="text-center"><?php echo $fila[3]; ?></td>
          <td class="text-center"><?php echo $fila2[1]; ?></td>
          <td class="text-center"><?php echo $fila2[3]; ?></td>
          <?php 
          $estado = $fila[2];
          if($estado == 2){?>
           <td class="text-center"><?php echo "Activo"; ?></td>
         <?php } elseif($estado == 1){ ?>
          <td class="text-center"><?php echo "Deudor"; ?></td>
        <?php } elseif($estado == 3){ ?>
          <td class="text-center"><?php echo "Bloqueado por Mora"; ?></td>
        <?php } elseif($estado == 4){ ?>
          <td class="text-center"><?php echo "Bloqueado"; ?></td>
        <?php } elseif ($estado == 5) {?>
          <td class="text-center"><?php echo "Bloqueado Especial"; ?></td>
        <?php } ?>
        <td class="text-center"><?php echo $fila[1].' '.$fila['indicaciones']; ?></td>
      </tr>
    <?php } ?>
  </table>
  <?php
}
?>