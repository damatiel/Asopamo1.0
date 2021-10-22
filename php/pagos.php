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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!--Boostrap JS-->
     <script src="../js/jquery-3.5.1.min.js"></script>
     <script src="../js/popper.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
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
                <a class="nav-link" href="internet.php">Internet</a>
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
              <a class="dropdown-item" href="consultaDeudas.php">Deudas</a>
              <a class="dropdown-item" href="consulta_deuda_mes.php">Deudas por Mes</a>
              <a class="dropdown-item" href="ConsultaPuntos.php">Puntos</a>
              <a class="dropdown-item" href="consultaSuscriptores.php">Suscriptores</a>
              <a class="dropdown-item" href="consultaInternet.php">Internet</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Configuracion
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="crearUsuario.php">Usuarios</a>
              <a class="dropdown-item" href="entidadPago.php">Entidad De Pago</a>
              <a class="dropdown-item" href="valores.php">Valores</a>
              <a class="dropdown-item" href="javascript:abrir()">BackUp</a>
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
                    <th scope="col" class="text-center">Borrar</th>

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
                    <?php $id = $fila[0]; ?>
                    <?php echo '<td class="text-center"><a href="ges_pagos.php?variable1='.$id.'">Borrar</a></td>'; ?>
                    
                    
                  </tr>

                <?php } ?>
                </tbody>
             </table>
           </div>
           
           <br><br><br>
           <div>
            <label>Fecha de Pago</label>
                <input type="date" name="fecha_p" class="form-control">
              </div>
              <br>
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
              <div class="text-center">
                <button type="submit" class="btn btn-success" name="pagarFactura">Pagar</button>
              </div>
            
            
            </div>
            </form>
            <div id = "ventana"class="ventanaBackup">
                <div id="cerrar"><a href="javascript:cerrar()"><img src="../img/close.png" alt=""></a></div>
                <div>
                <form method="POST" action="backup.php">
		              <h6>Crear Respaldo</h6>
                  <button type="submit" class="btn btn-success" name="backup">Crear</button>
              	</form>
                </div>
                <br>
                <div class="form-group">
                <form method="POST" action="restore.php">
	            	<h6>Subir Base De Datos</h6>
                <input type="file" name="sql" class="form-control-file">
                <br>
                <button type="submit" class="btn btn-success" name="backup">Subir</button>
	            </form>
                </div>
            </div>
            <script>
                function abrir(){
                  document.getElementById("ventana").style.display="block";
                }
                function cerrar(){
                  document.getElementById("ventana").style.display="none";
                }
            </script>
        </body>
        </html>

        
      