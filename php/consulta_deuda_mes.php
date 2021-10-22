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
        <div class="collapse navbar-collapse bg-primary">
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
        <h2 class="titulo text-center container">Consulta Deuda Mes</h2>
      </div>
      <br>
      <?php 
        $idPunto = "";
        $TDeuda = 0;
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
                  <option value ="para">PARABOLICA</option>
                  <option value ="inter">INTERNET</option>
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
                    <th class="text-center" scope="col">Nombre</th>
                    <th class="text-center" scope="col">Apellido</th>
                    <th class="text-center" scope="col">Cedula</th>
                    <th class="text-center" scope="col">Fecha de Deuda</th>
                    <th class="text-center" scope="col">Deuda</th>
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
                        <button type="submit" name="excel_deuda_mes" class="btn btn-primary">Exportar a Excel</button>
                        <input type="hidden" name="fecha_ini" value=<?php echo $fecha_ini ?>>
                        <input type="hidden" name="fecha_fin" value=<?php echo $fecha_fin ?>>
                        <input type="hidden" name="idEntidad" value=<?php echo $idEntidad ?>>
                      </form>
                      </div>
        <?php
                      
                      if ($idEntidad == "todos") {
                        $query = "SELECT * FROM deudas_meses WHERE fecha BETWEEN '$fecha_ini' AND '$fecha_fin'";
                      }elseif ($idEntidad == "para"){
                        $query = "SELECT * FROM deudas_meses WHERE fecha BETWEEN '$fecha_ini' AND '$fecha_fin' AND inter <= 0";
                      }elseif ($idEntidad == "inter") {
                        $query = "SELECT * FROM deudas_meses WHERE fecha BETWEEN '$fecha_ini' AND '$fecha_fin'AND inter >= 1";
                      }
                      
                      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                      while($fila1 = mysqli_fetch_array($query_exec)){
                        $idpunto = $fila1[1];
                        $query2 = "SELECT * FROM puntos WHERE id = $idpunto";
                        $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                        $fila2 = mysqli_fetch_array($query_exec2);
                        $doc = $fila2[3];
                        $query3 = "SELECT * FROM suscriptores WHERE doc = $doc";
                        $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta");
                        $fila3 = mysqli_fetch_array($query_exec3);
                        $TDeuda += $fila1[3];
                        
                      ?>

                     <tr>
                     <td class="text-center"><?php echo $fila1[1]; ?></td>
                     <td class="text-center"><?php echo $fila3[1]; ?></td>
                     <td class="text-center"><?php echo $fila3[3]; ?></td>
                     <td class="text-center"><?php echo $fila3[0]; ?></td>
                     <td class="text-center"><?php echo $fila1[2]; ?></td>
                     <td class="text-center"><?php echo "$".$fila1[3]; ?></td>
                      </tr>
                      <?php } ?>
                     
                      <?php } ?>
                </tbody>
                
              </table>
         </div>
         
    </body>
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
    <br>
    <div>
        <h2 class="titulo text-center container">Totalidad Recaudos</h2>
      </div>
    <footer>
    <div>
              <table class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Total Deuda</th>
                  </tr>
                </thead>
                <tbody>
                
                <td class="text-center"><?php echo "$".$TDeuda; ?></td>
                </tbody>
              </table>
    </div>

    
    </footer>
    </html>
