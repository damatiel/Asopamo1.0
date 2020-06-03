<?php  
  require_once __DIR__ . '/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.html"); 

  $documento ="";
$nomCompleto ="";
$dirPunto ="";
$deuda ="";
$fecha_pago ="";
$atrasos ="";
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
                
            </li>
            <li class="nav-item">
                <a class="nav-link">Usuario: Miguel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Salir</a>
            </li>
            
            
          </ul>
          
        </div>
      </nav>
         <br>
          <div>
            <h2 class="titulo text-center container">Ultimos Pagos</h2>
          </div>
          <br>
          <form method = "POST" class="container" action = "#">
              <div class="gridConsultas">
              <div class="container">
            <label>Documento</label>
            <input type="number" class="form-control" name="txtDocumento" placeholder="txtDocumento">
            <br>
            <button type="submit" class="btn btn-primary" name="buscardoc">Buscar</button>
             </div>
             <div>
            <div class="container">
                <div>
                  <label>Direccion</label>
                 
                </div>
                
          
            </div>
              <div class="form-group gridDireccion">
                <div>
                  <select name="tipo_direc" class="form-control">
                    <option value = "Calle">Calle</option>
                    <option value = "Carrera">Carrera</option>
                  </select>
                </div>
                <div>
                  <input type="number" class="form-control" name="numero_direc" placeholder="">
                </div>
                <div>
                  <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
                    id="txt" placeholder="#">
                </div>
                <div>
                  <input type="number" class="form-control" name="numero2_direc" placeholder="">
                </div>
                <div>
                  <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
                    id="txt" placeholder="-">
                </div>
                <div>
                  <input type="number" class="form-control" name="numero3_direc" placeholder="">
                </div>
                <div>
                  <br>
                  <button type="submit" name ="buscarDireccion" class="btn btn-primary">Buscar</button>
                </div>
              </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">Documento</th>
                    <th scope="col" class="text-center">Suscriptor</th>
                    <th scope="col" class="text-center">Punto</th>
                    <th scope="col" class="text-center">Deuda Actual</th>
                    <th scope="col" class="text-center">Atrasos</th>
                    <th scope="col" class="text-center">Ultimo Pago</th>
                    <th scope="col" class="text-center">Valor Pagado</th>
                    <th scope="col" class="text-center">Entidad</th>
                    

                  </tr>
                </thead>
                <tbody>
                  <!--CONSULTA POR DOCUMENTO INICIO-->
                <?php
                if (isset($_POST["buscardoc"])){
                    $documento = $_POST['txtDocumento'];
                    $query = "SELECT * FROM puntos WHERE doc_suscriptor = $documento";
                    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                    while($fila = mysqli_fetch_array($query_exec)){
                      $query2 = "SELECT * FROM suscriptores WHERE doc = $documento";
                      $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                      $fila2 = mysqli_fetch_array($query_exec2);
                      $query3 = "SELECT * FROM pagos ORDER BY id_pagos DESC LIMIT 1";
                      $query_exec3 = mysqli_query($db->conectar(),$query3)or die("no se puede realizar la consulta");
                      $fila3 = mysqli_fetch_array($query_exec3);
                      $idEntidad = $fila3['id_entPago'];
                      $query4 = "SELECT * FROM ent_pago WHERE id = $idEntidad;";
                      $query_exec4 = mysqli_query($db->conectar(),$query4)or die("no se puede realizar la consulta");
                      $fila4 = mysqli_fetch_array($query_exec4);
                    ?>
                  <tr>
                    <td class="text-center"><?php echo $fila2[0]; ?></td>
                    <td class="text-center"><?php echo $fila2[1]." ".$fila2[3]; ?></td>
                    <td class="text-center"><?php echo $fila[1]; ?></td>
                    <td class="text-center"><?php echo "$ ".$fila[4]; ?></td>
                    <td class="text-center"><?php echo $fila[5]; ?></td>
                    <td class="text-center"><?php  echo $fila3[4]; ?></td>
                    <td class="text-center"><?php echo $fila4[1]; ?></td>
                    <?php } ?>
                  </tr>
                  <?php }?>
                  <!--CONSULTA POR DOCUMENTO FIN-->
                  <!--CONSULTA POR DIRECCION INICIO-->
                  <?php
                if (isset($_POST["buscarDireccion"])){
                    $td = $_POST['tipo_direc'];
                    $n1 = $_POST['numero_direc'];
                    $n2 = $_POST['numero2_direc'];
                    $n3 = $_POST['numero3_direc'];
                    $dire = $td.$n1.'#'.$n2.'-'.$n3; 
                    $query = "SELECT * FROM puntos WHERE dir = '$dire'";
                    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                    while($fila = mysqli_fetch_array($query_exec)){?>
                  <tr>
                    <td class="text-center"><?php 
                    $documento = $fila['doc_suscriptor'];
                    $saldo = $fila['saldo_ant']; 
                    $atraso = $fila['contador'];
                    echo $fila['doc_suscriptor']; 

                    ?></td>
                    <?php } ?>
                    <?php
                     $query = "SELECT * FROM suscriptores WHERE doc = $documento";
                     $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                     while($fila = mysqli_fetch_array($query_exec)){?>
                      <td class="text-center"><?php echo $fila['primer_nom']." ".$fila['primer_ape']; ?></td>
                     <?php } ?>
                     <td class="text-center"><?php echo $dire; ?></td>
                     <td class="text-center"><?php echo "$ ".$saldo; ?></td>
                      <td class="text-center"><?php echo $atraso; ?></td>
                      <?php 
                      $query = "SELECT * FROM pagos ORDER BY id_pagos DESC LIMIT 1 WHERE ";
                      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                      while($fila = mysqli_fetch_array($query_exec)){?>
                       <td class="text-center"><?php $idEntidad = $fila['id_entPago']; echo $fila['fecha_pago']; ?></td>
                    <?php } ?>
                    <?php 
                      $query = "SELECT * FROM ent_pago WHERE id = $idEntidad;";
                      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                      while($fila = mysqli_fetch_array($query_exec)){?>
                       <td class="text-center"><?php echo $fila['Nombre']; ?></td>
                    <?php } ?>
                  </tr>
                  <?php }?>
                  <!--CONSULTA POR DIRECCION FIN-->
                </tbody>
              </table>
          </div>
        
        </form>
        </body>
        </html>