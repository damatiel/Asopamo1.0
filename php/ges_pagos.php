<?php 

require_once __DIR__ . '/conectar.php';

    $db = new DB_CONNECT();
    if (isset($_POST["buscarFactura"])) {
        $numFactura = $_POST['txtNFactura'];
        
    }



?>