  <?php  
  require_once __DIR__ . '/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
      //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.php"); 
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet</title>
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
                <a class="dropdown-item" href="javascript:abrir()">BackUp</a></a>
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
          <h2 class="titulo text-center container">Internet</h2>
        </div>
        <div>
          <form id="loginForm" method="POST" action="#">
            <div class="container form-group">
              <label class="container">Documento</label>
              <input type="number" class="form-control documentoSuscriptor" name="txtDocumento" id="txtDocumento" placeholder="Documento">
              <div class="container form-group">
                <br>
                <button type="submit" id="submit" value="submit" name="submit" class="btn btn-primary">Consultar</button>
              </div>

            </div>
          </form>
          <?php if (isset($_POST["submit"])) {
            $documento = $_POST['txtDocumento'];
            $query = "SELECT * FROM puntos WHERE doc_suscriptor = '$documento' AND estado = 2";

            $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

            if ($fila = mysqli_fetch_array($query_exec)) {
              ?>
              <script type="text/javascript">
                alert('El usuario cumple con los requisitos para acceder al servicio');
              </script>
              <form method="POST" action="gest_int.php">
                <div class="container form-group">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Activar</th>
                        <th scope="col">Documento</th>
                        <th scope="col">ID Punto</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Primer Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Atrasos</th>
                        <th scope="col">Deudas</th>
                        <th scope="col">Fecha de Activación</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr><?php 
                      $query = "SELECT * FROM puntos WHERE doc_suscriptor = '$documento'";

                      $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                      while ($fila = mysqli_fetch_array($query_exec)) { 
                        $doc = $fila['doc_suscriptor'];
                        $id_punto = $fila['id'];
                        ?>
                        <td><input type="checkbox" name="activo" value=<?php echo $id_punto ;?>></td>
                        <td><?php echo $fila['doc_suscriptor']; ?></td>
                        <td><?php echo $id_punto; ?></td>
                        <td><?php echo $fila['dir']; ?></td>
                        <?php 
                        $query2 = "SELECT * FROM suscriptores WHERE doc = '$doc'";

                        $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");

                        if ($fila2 = mysqli_fetch_array($query_exec2)) {
                         ?>
                         <td class="text-center"><?php echo $fila2['primer_nom']; ?></td>
                         <td class="text-center"><?php echo $fila2['primer_ape']; ?></td>
                         <?php 
                         $estado = $fila['estado'];
                         if ($estado == 2) {
                          $estado = "Activo";
                        }elseif ($estado == 1) {
                          $estado = "Deudor";
                        }elseif ($estado == 3) {
                          $estado = "Suspendido por mora";
                        }elseif($estado == 5){
                          $estado = "Bloqueado Especial";
                        }

                        ?>

                        <td class="text-center"><?php echo $estado; ?></td>
                        <td class="text-center"><?php echo $fila['contador']; ?></td>
                        <td class="text-center"><?php echo $fila['saldo_ant']; ?></td>
                        <td class="text-center"><?php echo $fila['fecha_act']; ?></td>

                      <?php } ?>
                    </tr>
                  <?php } ?>




                </tbody>
              </table>
            </div>
            <br>

            <div class="container form-group text-center">
              <button type="submit" name="activar_inter" class="btn btn-success">Activar internet</button>
            </div>
            </form>
            <?php
          }else {?>

            <script type="text/javascript">
              alert('Recuerde que debe ser suscriptor y tener un punto activo, para acceder este servicio');
            </script>

          <?php }}?> 

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


      </body>
      </html>