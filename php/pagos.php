<?php  
  require_once __DIR__ . '/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.html"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <!--Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!--Boostrap JS-->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--C-->
    <link rel="stylesheet" href="../css/main.css">
    
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse bg-primary"; id="">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="suscriptores.php">Suscriptores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="puntos.php">Puntos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Facturacion</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="pagos.php">Pagos</a>
            </li>
            
           
            <li class="nav-item dropdown absolute">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consultas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Deudas Suscriptores</a>
                <a class="dropdown-item" href="#">Pagos Suscriptores</a>   
                <a class="dropdown-item" href="consultaRecibos.php">Recaudos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Configuracion
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearUsuario.php">Crear Usuario</a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link">Usuario: <?php echo $_SESSION['nombres']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="salir.php">Salir</a>
            </li>
            
            
          </ul>
          
        </div>
      </nav>
          <div>
            <h2 class="titulo text-center container">Pagos</h2>
          </div>
          <br><br>
          
          <?php 
          $nomCompleto = "Nombre Suscriptor";
          $tel = "Telefono";
          $direccion = "Direccion";
          ?>
          <form method = "POST" class="formularioPagos" action = "#" >

            <div>
            <div class="gridPagos">
              <div class="text-center p-1">
                <label>Numero Factura</label>
              </div>
              <div>
                <input type="number" class="form-control" name="txtNFactura" autofocus placeholder="txtNFactura">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" name="buscarFactura">Buscar</button>
              </div>
              </div>
            </form>
            <br><br>
           <?php  
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
                        $query = "SELECT primer_nom, segundo_nom, primer_ape, segundo_ape, tel, direc FROM suscriptores WHERE doc = $docSuscriptor";
                        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                        if($fila = mysqli_fetch_array($query_exec)){
                           $pNom = $fila['primer_nom'];
                           $sNom = $fila['segundo_nom'];
                           $pApe = $fila['primer_ape'];
                           $sApe = $fila['segundo_ape'];
                           $tel = $fila['tel'];
                           $direccion = $fila['direc'];
                           $nomCompleto = $pNom." ".$sNom." ".$pApe." ".$sApe;
                           
                           
                        }
                     }
                       
                     }
                    
                
                }else{

                }
           ?>
           <div>
             <label class="container">Nombre Suscriptor</label>
             <label class="form-control"><?php echo $nomCompleto; ?></label>
          </div>
           <div class="gridPagos">
             <div class="p-1">
               <label class="container">Telefono</label>
               <label for="" class="form-control"><?php echo $tel; ?></label>
             </div>
             <div class="p-1">
              <label class="container">Direccion</label>
              <label for="" class="form-control"><?php echo $direccion; ?></label>
            </div>
            <div class="p-1">
              <label class="container">Total</label>
              <label for="" class="form-control">Label Total</label>
            </div>
           </div>
           <br><br><br>
            <div class="gridPagos">
              <div class="p-1">
                <label class="">Entidad De Pago:</label>
              </div>
              <div>
                <select class="form-control">
                  <option>Calle</option>
                  <option>Carrera</option>
                </select>
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-success">Pagar</button>
              </div>
            
            
            </div>
         
         
        </body>
        </html>

        
      