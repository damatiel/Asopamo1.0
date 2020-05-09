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
            <a class="dropdown-item" href="#">Deudas Suscriptores</a>
            <a class="dropdown-item" href="#">Pagos Suscriptores</a>   
            <a class="dropdown-item" href="consultaRecibos.php">Recaudos</a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
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
      <div>
        <br>
        <button type="submit" name="buscarpunto" class="btn btn-primary">Buscar</button>
      </div>
    </div>
    <div class="container form-group">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Documento</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Direccion</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ejemplo</td>
            <td>ejemplo</td>
            <td>ejemplo</td>
            <td>ejemplo</td>
          </tr>

        </tbody>
      </table>
    </div>
    <br>
    <div class="container form-group">
      <div>
        <label>Descuento</label>
        <input type="number" class="form-control" id="txtDescuento" placeholder="txtDescuento">
      </div>
    </div>

    <div class="container form-group text-center">
      <button type="submit" name="registrardescuento" class="btn btn-success">Registrar</button>
      <button type="submit" name="actualizarpunto" class="btn btn-info">Actualizar</button>
      <button type="submit" name="eliminarpunto" class="btn btn-danger">Eliminar</button>

    </div>

  </form>
</body>

</html>