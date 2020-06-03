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
  <title>Puntos</title>
  <!--Boostrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--Boostrap JS-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <!--C-->
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse bg-primary" ; id="">
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
        <li class="nav-item dropdown" style="z-index: 0;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Consultas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="consultaUltPagos.php">Ultimos Pagos</a> 
              <a class="dropdown-item" href="consultaRecaudos.php">Recaudos</a>
              <a class="dropdown-item" href="ConsultaPuntos.php">Puntos</a>
              <a class="dropdown-item" href="consultaSuscriptores.php">Suscriptores</a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Configuracion
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">       
            <a class="dropdown-item" href="crearUsuario.php">Usuarios</a>
            <a class="dropdown-item" href="entidadPago.php">Entidad De Pago</a>
            <a class="dropdown-item" href="valores.php">Valores</a>

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
  <div class="gridRPuntos">
  <div>
  <div>
    <h2 class="titulo text-center container">Puntos</h2>
  </div>
  <form method="post" action="ges_punto.php" class="formularioPuntos">
    <div class="container form-group">
      <label>Documento</label>
      <div class="gridCrearPunto">
        <div><button type="submit" name="crearpunto" class="btn btn-dark">Crear</button></div>
        <div><input type="number" name="cedula" class="form-control" id="txtDocumento" placeholder="txtDocumento"></div>
      </div>
    </div>
    <br>
    <div class="container">
      <div>
        <label>Direccion</label>
      </div>

    </div>
    <div class="container form-group gridDireccion">
      <div>
        <select name="tipo_direc" class="form-control">
          <option value="calle">Calle</option>
          <option value="carrera">Carrera</option>
        </select>
      </div>
      <div>
        <input type="text" name="numero_direc" class="form-control" maxlength="3" id="txt" style="text-transform:uppercase;" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="#">
      </div>
      <div>
        <input type="text" name="numero2_direc" class="form-control" maxlength="3" id="txt" style="text-transform:uppercase;" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="-">
      </div>
  </div>
  <div class="form-group container">
    <label for="exampleFormControlTextarea1">Indicaciones</label>
    <textarea class="form-control" rows="3" placeholder ="Digite Aca el barrio o cualquier otra indicacion"></textarea>
  </div>
      </form>
      </div>
      
      <div>
      <form action="#" class="formularioPuntos" method="post">
      <div>
      <h2 class="titulo text-center container">Consulta De Puntos</h2>
  </div>
      <div class="container">
        <div>
        <label>Direccion</label>
      </div>
        <div class=" form-group gridDireccion">
      <div>
        <select name="tipo_direc" class="form-control">
          <option value="calle">Calle</option>
          <option value="carrera">Carrera</option>
        </select>
      </div>
      <div>
        <input type="text" name="numero_direc" class="form-control" maxlength="3" id="txt" style="text-transform:uppercase;" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="#">
      </div>
      <div>
        <input type="text" name="numero2_direc" class="form-control" id="txt" maxlength="3" style="text-transform:uppercase;" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="-">
      </div>
      <div>
        <input type="text" name="numero3_direc" class="form-control" id="txt" maxlength="3" style="text-transform:uppercase;" placeholder="">
      </div>
        
    </div>
    <br>
    <div>
    <button type="submit" name="buscarpunto" class="btn btn-primary">Buscar por direccion</button>
    </div>
    <br>
    <div class="form-group gridDireccion">
      <div>
        <label>ID Punto</label>
        <input type="number" name="id" class="form-control">
      </div>
    </div>
    <div>
        <button type="submit" name="buscarpuntoid" class="btn btn-primary">Buscar por id punto</button>
      </div>
      </div>
      <br>

    </form>
    </div>
</div>
<br>
    <?php if (isset($_POST["buscarpunto"])) {?>

      <?php
        $td = $_POST['tipo_direc'];
        $n1 = $_POST['numero_direc'];
        $n2 = $_POST['numero2_direc'];
        $n3 = $_POST['numero3_direc'];
        $dire = $td.$n1.'#'.$n2.'-'.$n3; 
        $query = "SELECT * FROM puntos WHERE dir = '$dire'";

        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

        
      ?>
       
      <form method="post" action="ges_punto.php">
        <div class="container form-group">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Documento</th>
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
            if ($fila = mysqli_fetch_array($query_exec)) { 
            $doc = $fila['doc_suscriptor'];
            $id_punto = $fila['id'];
            ?>
        
            <td class="text-center"><?php echo $fila['doc_suscriptor']; ?></td>
            
            <td class="text-center"><input type="text" class="form-control text-center" name="dir" value=<?php echo $fila['dir']; ?>></td>
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
              $estado = "Suspendido";
            }
             ?>
            <td class="text-center"><?php echo $estado; ?></td>
            <td class="text-center"><?php echo $fila['contador']; ?></td>
            <td class="text-center"><?php echo $fila['saldo_ant']; ?></td>
            <td class="text-center"><?php echo $fila['fecha_act']; ?></td>

          <?php } ?>
            <?php } ?>

            
          </tr>

        </tbody>
      </table>
    </div>
    <br>
   
      <div class="container form-group">
      <div>
        <label>Descuento</label>
        <input type="number" class="form-control" name="descuento" id="txtDescuento" value="0" placeholder="Descuento"><br>
        <input type="hidden" name="documento" value="<?php echo $doc; ?>" />
        <input type="hidden" name="id_punto" value="<?php echo $id_punto; ?>" />
        <input type="checkbox" name="matricula" value="2">
        <label for="matricula"> MATRICULA</label><br>
        <input type="checkbox" name="traslado" value="3">
        <label for="traslado"> TRASLADO</label><br>
        <input type="checkbox" name="reactivacion" value="4">
        <label for="matricula"> REACTIVACIÓN</label><br>
      </div>
    </div>

    <div class="container form-group text-center">
      <button type="submit" name="registrardescuento" class="btn btn-success">Registrar</button>
      <button type="submit" name="actualizarpunto" class="btn btn-info">Actualizar</button>
      <button type="submit" name="suspender" class="btn btn-danger">Suspender</button>
      <button type="submit" name="activar" class="btn btn-success">Activar</button>

    </div>

    </form>
   <?php  }?>
            
      <!-- __________________________________________________________________________________________________ -->
      <?php if (isset($_POST["buscarpuntoid"])) {?>

      <?php
        $id = $_POST['id']; 
        $query = "SELECT * FROM puntos WHERE id = '$id'";

        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

        
      ?>
      <div>
   
      <form method="post" action="ges_punto.php">
        <div class="container form-group">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Documento</th>
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
          <tr><?php if ($fila = mysqli_fetch_array($query_exec)) { 
            $doc = $fila['doc_suscriptor'];
            $id_punto = $fila['id'];
            ?>
        
            <td><?php echo $fila['doc_suscriptor']; ?></td>
            
            <td class="text-center"><input type="text" class="form-control text-center" name="dir" value=<?php echo $fila['dir']; ?>></td>
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
              $estado = "Suspendido";
            }
             ?>
            <td class="text-center"><?php echo $estado; ?></td>
            <td class="text-center"><?php echo $fila['contador']; ?></td>
            <td class="text-center"><?php echo $fila['saldo_ant']; ?></td>
            <td class="text-center"><?php echo $fila['fecha_act']; ?></td>

          <?php } ?>
            <?php } ?>

            
          </tr>

        </tbody>
      </table>
    </div>
    <br>
    
      <div class="container form-group">
      <div>
        <label>Descuento</label>
        <input type="number" class="form-control" name="descuento" id="txtDescuento" value="0" placeholder="Descuento"><br>
        <input type="hidden" name="documento" value="<?php echo $doc; ?>" />
        <input type="hidden" name="id_punto" value="<?php echo $id_punto; ?>" />
        <input type="checkbox" name="matricula" value="2">
        <label for="matricula"> MATRICULA</label><br>
        <input type="checkbox" name="traslado" value="3">
        <label for="traslado"> TRASLADO</label><br>
        <input type="checkbox" name="reactivacion" value="4">
        <label for="matricula"> REACTIVACIÓN</label><br>
      </div>
    </div>

    <div class="container form-group text-center">

      <button type="submit" name="registrardescuento" class="btn btn-success">Registrar Costos</button>
      <button type="submit" name="actualizarpunto" class="btn btn-info">Actualizar Dirección</button>
      <?php if ($estado == 'Activo' or $estado == 'Deudor'): ?>
        <button type="submit" name="suspender" class="btn btn-danger">Suspender Punto</button>
      <?php endif ?>
      <?php if ($estado == 'Suspendido'): ?>
        <button type="submit" name="activar" class="btn btn-success">Activar Punto</button>
      <?php endif ?>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Vender Punto</button>
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Vender Punto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
           <h6>Ingrese el nuevo numero de cedula</h6>
          <input type="number" name="cedula2"><br><br>
          <button type="submit" name="venderpunto" class="btn btn-success">Vender</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
      

    </div>

    </form>
    

   <?php  }?>
    

  
</body>

</html>