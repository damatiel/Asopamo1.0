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
    <title>Consulta Decaudos</title>
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
              <a class="dropdown-item" href="consultaDeudas.php">Deudas</a>
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
        <h2 class="titulo text-center container">Consulta Deudas</h2>
      </div>
      
      <br>
      <?php 
        $idPunto = "";
        $idEstado = "";
        $TTotal = 0;
      ?>
      <form method = "POST" class="container formularioCRecibos" action = "#">      
            <div class="gridCbxCRecibos text-center">
            <label class="form-group p-1 labelCRecibos">Filtro De Estado</label>
                <select class="form-control cbxCRecibos" name="select">
                  <option value ="todos">TODOS</option>
                  <option value="1">CON MORA</option>
                  <option value="2">AL DIA</option>
                  <option value="3">BLOQUEADO</option>
                  <option value="4">SUSPENDIDO</option>
                  <option value="5">BLOQUEO ESPECIAL</option>
                  
                  </select>
                <div class="btnCRecibos">
                    <button type="submit"  name ="btnConsultar" class="btn btn-dark">Consultar</button>
                </div>
            </div>
            </form>
        <br>
        <div class="table-wrapper-scroll-y tablaDeudas">
            <table class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Punto</th>
                    <th class="text-center" scope="col">Direccion</th>
                    <th class="text-center" scope="col">Documento</th>
                    <th class="text-center" scope="col">Nombre</th>
                    <th class="text-center" scope="col">Fecha Ult Pago</th>
                    <th class="text-center" scope="col">Atrasos</th>
                    <th class="text-center" scope="col">Estado</th>
                    <th class="text-center" scope="col">Deuda</th>
                  </tr>
                </thead>
                <tbody >
                  <?php
                     if (isset($_POST["btnConsultar"])){
                      $idEstado = $_POST['select'];
                      ?>
                      
                     <?php
                  
                      $query = "SELECT * FROM pagos ";
                      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                      while($fila1 = mysqli_fetch_array($query_exec)){
                        $idPunto =$fila1[2];
                        if ($idEstado == "todos") {
                          $query2 = "SELECT * FROM puntos WHERE id = $idPunto";
                          $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                        }else{
                          $query2 = "SELECT * FROM puntos WHERE estado = $idEstado AND id = $idPunto";
                          $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                        }
                        
                        if ($fila2 = mysqli_fetch_array($query_exec2)) {
                          $TTotal += $fila2[4];
                        
                          ?>
                          
                             <tr>
                                <td class="text-center"><?php echo $fila1[0]; ?></td>
                                <td class="text-center"><?php echo $fila2[1]; ?></td>
                                <td class="text-center"><?php echo $fila2[3]; ?></td>
                                <td class="text-center"><?php echo $fila1[7]; ?></td>
                                <td class="text-center"><?php echo $fila1[4]; ?></td>
                                <td class="text-center"><?php echo $fila2[5]; ?></td>
                         <?php
                        switch ($fila2[2]) {
                          case 1:
                             ?> <td class="text-center">Con Mora</td><?php
                              break;
                          case 2:
                            ?> <td class="text-center">Al Dia</td><?php
                              break;
                          case 3:
                            ?> <td class="text-center">Bloqueado</td><?php
                              break;
                          case 4:
                            ?> <td class="text-center">Suspendido</td><?php
                                break;  
                          case 5:
                            ?> <td class="text-center">Bloqueado Especial</td><?php
                                  break; 
                      }
                     ?>
                     
                     <td class="text-center"><?php echo $fila2[4]; ?></td>
                      </tr>
                         <?php }}
                        }
                      ?>
                </tbody>
                
              </table>
         </div>
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
         <div class="text-center border-top">
        <h4>Total de Deudas $<?php echo $TTotal; ?></h4>
        
      </div>
      <div id = "ventana"class="text-center" >
        <form method = "post" action = "excel.php">
          <button type="submit" name="excel_deudas" class="btn btn-success">Exportar a Excel</button>
          <input type="hidden" name="idEstado" value=<?php echo $idEstado; ?>>
        </form>
      </div>
      
    </body>
    
    <footer>
    </footer>
    </html>
