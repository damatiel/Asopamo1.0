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
    <title>ConsultaRecaudos</title>
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
        <div class="collapse navbar-collapse bg-primary";" id="">
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
             <a class="dropdown-item" href="javascript:abrir()">BackUp</a>
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
        <h2 class="titulo text-center container">Consulta Recaudos</h2>
      </div>
      <br>
      <?php 
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
      ?>
      <form method = "POST" class="container formularioCRecibos" action = "#">
            <div class="container gridCRecibos">
                <div class="container form-group">
                    <label class="container text-center">Desde</label>
                  <input type="date" class="form-control documentoSuscriptor" name="fInicial" >
                </div>
                <div class="container form-group">
                    <label class="container text-center">Hasta</label>
                  <input type="date" class="form-control documentoSuscriptor" name="fFinal" >
                </div>
            </div>
            
            <div class="gridCbxCRecibos text-center">
                <label class="form-group p-1 labelCRecibos">Entidad De Pago</label>
                <select class="form-control cbxCRecibos" name="select">
                  <option value ="todos">TODOS</option>
                <?php
                  $query = "SELECT * FROM ent_pago";
                  $resul = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                  while ($row=mysqli_fetch_array($resul)){?>
                      <option value = <?php echo $row['id']; ?>><?php echo $row['Nombre']; ?> </option>
                  <?php } ?>

                  </select>
                <div class="btnCRecibos">
                    <button type="submit"  name ="btnConsultar" class="btn btn-dark">Consultar</button>
                </div>
            </div>
            </form>
        <br>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-hover table-condensed">
                <thead>
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
                </thead>
                <tbody >
                  <?php  ?>
                  <?php
                     if (isset($_POST["btnConsultar"])){
                      $fecha_ini = $_POST['fInicial'];
                      $fecha_fin = $_POST['fFinal'];
                      $idEntidad = $_POST['select'];
                      ?>
                      <div class="float-right text-center">
                      <form method = "post" action = "excel.php">
                        <button type="submit" name="excel_recaudos" class="btn btn-primary">Exportar a Excel</button>
                        <input type="hidden" name="fecha_ini" value=<?php echo $fecha_ini ?>>
                        <input type="hidden" name="fecha_fin" value=<?php echo $fecha_fin ?>>
                        <input type="hidden" name="idEntidad" value=<?php echo $idEntidad ?>>
                      </form>
                      </div>
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
                     
                      <?php } ?>
                </tbody>
                
              </table>
         </div>
         
    </body>
    <br>
    <div>
        <h2 class="titulo text-center container">Totalidad Recaudos</h2>
      </div>
    <footer>
    <div>
              <table class="table table-hover table-condensed">
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
    </div>

    
    </footer>
    <div id = "ventana"class="ventanaBackup">
                <div id="cerrar"><a href="javascript:cerrar()"><img src="../img/close.png" alt=""></a></div>
                <div>
                <form method="post" action="backup.php">
		              <h6>Crear Respaldo</h6>
                  <button type="submit" class="btn btn-success" name="backup">Crear</button>
              	</form>
                </div>
                <br>
                <div class="form-group">
                <form method="post" action="restore.php">
	            	<h6>Subir Base De Datos</h6>
                <input type="file" class="form-control-file">
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
    </html>
