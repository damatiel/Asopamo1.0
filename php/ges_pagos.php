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
               
                 
              }
           }
             
           }
          
           
      }
      if (isset($_POST["pagarFactura"])) {
         $numFactura = $_POST['txtNumeroFactura'];
         $id_pagos = $_POST['select'];
         
        $query = "UPDATE facturacion set total_pagar = '0', saldo_ant = '0' WHERE numero_fact = $numFactura";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
        $query = "SELECT id_punto FROM facturacion WHERE numero_fact = $numFactura";
          $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
             if($fila = mysqli_fetch_array($query_exec)){
               $idPunto = $fila['id_punto'];
               $query = "UPDATE pagos set num_factura = '$numFactura', id_entPago = '$id_pagos', fecha_pago = NOW() WHERE id_punto = $idPunto";
               $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta p");  
             }
             $query = "UPDATE puntos set saldo_ant = 0, contador = 0, descuento = 0, traslado = 0, matricula = 0,reactivacion = 0, multa = 0, estado = 2 WHERE id = $idPunto";
             $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
       }
        
        
    
      


?>