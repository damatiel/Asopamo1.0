<?php 

require_once __DIR__ . '/conectar.php';

    $db = new DB_CONNECT();
    if (isset($_POST["buscarFactura"])) {
        $numFactura = $_POST['txtNFactura'];
        $query = "SELECT id_punto FROM facturacion WHERE numero_fact = $numFactura";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
        if($fila = mysqli_fetch_array($query_exec)){
             $idPunto = $fila['id_punto'];
             $query = "SELECT doc_suscriptor FROM puntos WHERE id = $idPunto";
             $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
             if($fila = mysqli_fetch_array($query_exec)){
                $docSuscriptor = $fila['doc_suscriptor'];
                $query = "SELECT primer_nom, segundo_nom, primer_ape, segundo_ape FROM suscriptores WHERE doc = $docSuscriptor";
                $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                if($fila = mysqli_fetch_array($query_exec)){
                   $pNom = $fila['primer_nom'];
                   $sNom = $fila['segundo_nom'];
                   $pApe = $fila['primer_ape'];
                   $sApe = $fila['segundo_ape'];
                   $tel = $fila['tel'];
                   $direccion = $fila['direc'];
                   $nomCompleto = $pNom." ".$sNom." ".$pApe." ".$sApe;
                   echo $nomCompleto;
                   
                }
             }
               
             }
            
        
        }
        
        
    



?>