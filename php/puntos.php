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
    <div class="collapse navbar-collapse bg-primary" ;" id="">
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
          <a class="dropdown-item" href="consultaRecibos.php">Recaudos</a>

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
        <input type="number" name="numero_direc" class="form-control" id="txt" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="#">
      </div>
      <div>
        <input type="number" name="numero2_direc" class="form-control" id="txt" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="-">
      </div>
      <div>
        <input type="number" name="numero3_direc" class="form-control" id="txt" placeholder="">
      </div>
      </form>
      </div>
      <form action="#" method="post">
        
    
      <div class="container">
        <div>
        <label>Direccion</label>
      </div>
        <div class="container form-group gridDireccion">
      <div>
        <select name="tipo_direc" class="form-control">
          <option value="calle">Calle</option>
          <option value="carrera">Carrera</option>
        </select>
      </div>
      <div>
        <input type="number" name="numero_direc" class="form-control" id="txt" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="#">
      </div>
      <div>
        <input type="number" name="numero2_direc" class="form-control" id="txt" placeholder="">
      </div>
      <div>
        <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
          id="txt" placeholder="-">
      </div>
      <div>
        <input type="number" name="numero3_direc" class="form-control" id="txt" placeholder="">
      </div>
        
    </div>
    <div class="container form-group gridDireccion">
      <div>
        <label>ID Punto</label>
        <input type="number" name="id" class="form-control">
      </div>
    </div>
    <div>
        <button type="submit" name="buscarpunto" class="btn btn-primary">Buscar por direccion</button>
        <button type="submit" name="buscarpuntoid" class="btn btn-primary">Buscar por id punto</button>
      </div>
      </div>
      <br>

    </form>
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
            <th scope="col">Atrasos</th>
            <th scope="col">Deudas</th>
            <th scope="col">Fecha de Activación</th>
          </tr>
        </thead>
        <tbody>
          <tr><?php 
            if ($fila = mysqli_fetch_array($query_exec)) { 
            $doc = $fila['doc_suscriptor'];
            ?>
        
            <td><input type="text" name="doc" value=<?php echo $fila['doc_suscriptor']; ?>></td>
            
            <td><input type="text" name="dir" value=<?php echo $fila['dir']; ?>></td>
            <?php 
              $query2 = "SELECT * FROM suscriptores WHERE doc = '$doc'";

              $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");

        if ($fila2 = mysqli_fetch_array($query_exec2)) {
             ?>
            <td><input type="text" name="p_n" value=<?php echo $fila2['primer_nom']; ?>></td>
            <td><input type="text" name="p_a" value=<?php echo $fila2['primer_ape']; ?>></td>
            <td><?php echo $fila['contador']; ?></td>
            <td><?php echo $fila['saldo_ant']; ?></td>
            <td><?php echo $fila['fecha_act']; ?></td>

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
        <input type="number" class="form-control" name="descuento" id="txtDescuento" placeholder="txtDescuento">
        <input type="hidden" name="documento" value="<?php echo $doc; ?>" />
        <input type="checkbox" id="vehicle1" name="matricula" value="MATRICULA">
        <label for="vehicle1"> MATRICULA</label><br>
        <input type="checkbox" id="traslado" name="traslado" value="traslado">
        <label for="traslado"> TRASLADO</label><br>
        <input type="checkbox" id="vehicle3" name="reactivacion" value="REACTIVACIÓN">
        <label for="vehicle3"> REACTIVACIÓN</label><br>
      </div>
    </div>

    <div class="container form-group text-center">
      <button type="submit" name="registrardescuento" class="btn btn-success">Registrar</button>
      <button type="submit" name="actualizarpunto" class="btn btn-info">Actualizar</button>
      <button type="submit" name="eliminarpunto" class="btn btn-danger">Eliminar</button>

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
      <form method="post" action="ges_punto.php">
        <div class="container form-group">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Documento</th>
            <th scope="col">Dirección</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Atrasos</th>
            <th scope="col">Deudas</th>
            <th scope="col">Fecha de Activación</th>
          </tr>
        </thead>
        <tbody>
          <tr><?php if ($fila = mysqli_fetch_array($query_exec)) { 
            $doc = $fila['doc_suscriptor'];
            ?>
        
            <td><input type="text" name="doc" value=<?php echo $fila['doc_suscriptor']; ?>></td>
            
            <td><input type="text" name="dir" value=<?php echo $fila['dir']; ?>></td>
            <?php 
              $query2 = "SELECT * FROM suscriptores WHERE doc = '$doc'";

              $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");

        if ($fila2 = mysqli_fetch_array($query_exec2)) {
             ?>
             <td><input type="text" name="p_n" value=<?php echo $fila2['primer_nom']; ?>></td>
            <td><input type="text" name="p_a" value=<?php echo $fila2['primer_ape']; ?>></td>
            <td><?php echo $fila['contador']; ?></td>
            <td><?php echo $fila['saldo_ant']; ?></td>
            <td><?php echo $fila['fecha_act']; ?></td>

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
      <button type="submit" name="eliminarpunto" class="btn btn-danger">Eliminar</button>

    </div>

    </form>
    

   <?php  }?>
    

  
</body>

</html>