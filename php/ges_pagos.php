  <?php 

  require_once __DIR__ . '/conectar.php';

  $db = new DB_CONNECT();
  if (isset($_POST["buscarFactura"])) {
    $numFactura = $_POST['txtNFactura'];
    $query = "SELECT id_punto, total_pagar FROM facturacion WHERE numero_fact = $numFactura";
    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
    if($fila = mysqli_fetch_array($query_exec)){
     $idPunto = $fila['id_punto'];
     $tPagar = $fila['total_pagar'];
     $query = "SELECT doc_suscriptor, dir FROM puntos WHERE id = $idPunto";
     $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
     if($fila = mysqli_fetch_array($query_exec)){
      $docSuscriptor = $fila['doc_suscriptor'];
      $direccion = $fila['dir'];
      $query = "SELECT primer_nom, segundo_nom, primer_ape, segundo_ape, tel FROM suscriptores WHERE doc = $docSuscriptor";
      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
      if($fila = mysqli_fetch_array($query_exec)){
       $pNom = $fila['primer_nom'];
       $sNom = $fila['segundo_nom'];
       $pApe = $fila['primer_ape'];
       $sApe = $fila['segundo_ape'];
       $tel = $fila['tel'];
       $nomCompleto = $pNom." ".$sNom." ".$pApe." ".$sApe;
       $query ="INSERT INTO pre_pagos (id,nombre,telefono,dir,total,num_fact) VALUES ('$idPunto','$nomCompleto', '$tel', '$direccion', '$tPagar', '$numFactura')";
       $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
       
       
     }
   }
   
 }
 
 
}
if (isset($_GET["variable1"])) {
 $id = $_GET['variable1'];
 $query ="DELETE FROM pre_pagos WHERE id = '$id'";
 $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
 echo "
 <script>
 window.location.replace('pagos.php');
 </script>
 ";
}
if (isset($_POST["pagarFactura"])) {
  $id_pagos = $_POST['select'];
  $fecha_pago = $_POST['fecha_p'];
  $query5 = "SELECT * FROM pre_pagos";
  $query_exec5 = mysqli_query($db->conectar(),$query5)or die("no se puede realizar la consulta pre pagos");
  while($fila = mysqli_fetch_array($query_exec5)){
    $idPunto = $fila[0];
    $nom = $fila[1];
    $tel = $fila[2];
    $dir = $fila[3];
    $total = $fila[4];
    $numFactura = $fila[5];

    $query = "UPDATE facturacion set total_pagar = '0', saldo_ant = '0' WHERE numero_fact = $numFactura";
    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta actualizar facturas");
    $query = "SELECT * FROM facturacion WHERE numero_fact = $numFactura";
    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta seleccionar facturacion");
    if($fila1 = mysqli_fetch_array($query_exec)){
     $idPunto = $fila1['id_punto'];
     $doc = $fila1[2];
     $p_fact = $fila1['periodo_fact'];
     $query = "UPDATE pagos set num_factura = '$numFactura', id_entPago = '$id_pagos', fecha_pago = '$fecha_pago' WHERE periodo_fact = '$p_fact' AND id_punto = '$idPunto'";
     $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta actualizacion pagos");  
   }
   $query = "SELECT * FROM puntos WHERE internet = 0";
   $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta linea 73");
   if($fila2 = mysqli_fetch_array($query_exec)){
    $query = "UPDATE puntos set saldo_ant = 0, contador = 0, descuento = 0, traslado = 0, matricula = 0,reactivacion = 0, multa = 0, estado = 2 WHERE id = $idPunto ";
    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta actualizar puntos");
  }else{
    $query = "UPDATE puntos set saldo_ant = 0, contador = 0, descuento = 0, traslado = 0, matricula = 0,reactivacion = 0, multa = 0, estado = 2, internet = 2 WHERE id = $idPunto ";
    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta actualizar puntos");
  }
  
  $query = "DELETE FROM cortes WHERE doc = '$doc'";
  $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta eliminar tabla cortes");
  

}
$query = "DELETE FROM pre_pagos";
$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta eliminar tabla pre_pagos");
echo "
<script>
alert('Pago realizado');
redir('pagos.php');
</script>
";


}






?>