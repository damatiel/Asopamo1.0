<?php  
    require_once __DIR__ . '/conectar.php';
    $db = new DB_CONNECT();
    if (isset($_POST["buscardoc"])) {
        $documento = $_POST['txtDocumento'];
        $query = "SELECT * FROM suscriptores WHERE doc = $documento";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
        if($fila = mysqli_fetch_array($query_exec)){
           $pNombre = $fila['primer_nom'];
           $pApellido = $fila['primer_ape'];
           $nomCompleto = $pNombre." ".$pApellido;
        }
        $query = "SELECT * FROM puntos WHERE doc_suscriptor = $documento";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
        if($fila = mysqli_fetch_array($query_exec)){
            $idPunto = $fila['id'];
            $dirPunto = $fila['dir'];
            $deuda = $fila['saldo_ant'];
            $atrasos = $fila['contador'];

        
        }
        $query = "SELECT * FROM pagos ORDER BY id_pagos DESC LIMIT 1";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
        if($fila = mysqli_fetch_array($query_exec)){
            $fecha_pago = $fila['fecha_pago'];
        
        }
        
    }

?>

