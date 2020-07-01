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
                <a class="nav-link" href="facturacion.php">Facturacion</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="pagos.php">Pagos</a>
            </li>
            
           
            <li class="nav-item dropdown absolute">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consultas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="consultaUltPagos.php">Ultimos Pagos</a> 
              <a class="dropdown-item" href="consultaRecaudos.php">Recaudos</a>
              <a class="dropdown-item" href="ConsultaPuntos.php">Puntos</a>
              <a class="dropdown-item" href="consultaSuscriptores.php">Suscriptores</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Configuracion
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="crearUsuario.php">Usuarios</a>
            <a class="dropdown-item" href="entidadPago.php">Entidad De Pago</a>
            <a class="dropdown-item" href="valores.php">Valores</a>
                
              </div>
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
          $tPagar = "Valor A Pagar";
          $numFactura ="";
          $idPunto = "";
        
         
          ?>
          <form method = "POST" class="formularioPagos" action = "#" >

            <div>
            <div class="gridPagos">
              <div class="text-center p-1">
                <label>Numero Factura</label>
              </div>
              <div>
                <input type="number" class="form-control" name="txtNFactura" autofocus placeholder="Numero Factura">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" name="buscarFactura">Buscar</button>
                
              </div>
              </div>
            
            <br><br>
           <?php  
            include('ges_pagos.php');
           ?>
           <div class="container ">
            
          
          <table class="table table-hover table-bordered">
               <thead>
                  <tr>
                    <th scope="col" class="text-center">ID Punto</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Telefono</th>
                    <th scope="col" class="text-center">Dirección</th>
                    <th scope="col" class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $query = "SELECT * FROM pre_pagos";
                      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                      while($fila = mysqli_fetch_array($query_exec)){ 
                   ?>
                  <tr>
                    <td class="text-center"><?php echo $fila[0]; ?></td>
                    <td class="text-center"><?php echo $fila[1]; ?></td>
                    <td class="text-center"><?php echo $fila[2]; ?></td>
                    <td class="text-center"><?php echo $fila[3]; ?></td>
                    <td class="text-center"><?php echo $fila[4]; ?></td>
                  </tr>
                <?php } ?>
                </tbody>
             </table>
           </div>
           <br><br><br>
            <div class="gridPagos">
              <div class="p-1">
                <label class="">Entidad De Pago:</label>
                <input type="number" name="txtNumeroFactura" style="display:none;" value =<?php echo $numFactura; ?>>
              </div>
              <div>
              <select class="form-control" name="select">
                <?php
                  $query = "SELECT * FROM ent_pago";
                  $resul = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                  while ($row=mysqli_fetch_array($resul)){?>
                      <option value = <?php echo $row['id']; ?>><?php echo $row['Nombre']; ?> </option>
                  <?php } ?>
                   <input name = "idPago" style="display:none;" value = <?php echo $idPunto; ?> >
                  </select>                   
              </div>
              <div>
                <label class="">Entidad De Pago:</label>
                <input type="date" name="fecha_p" class="form-control">
              </div>
              <div class="text-center">
                <button type="sunmit" class="btn btn-success" name="pagarFactura">Pagar</button>
              </div>
            
            
            </div>
            </form>
         
        </body>
        </html>

        
      