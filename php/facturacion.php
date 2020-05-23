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
    <title>Suscriptores</title>
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
              <a class="dropdown-item" href="consultaRecibos.php">Recaudos</a>
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
                <a class="nav-link">Usuario: <?php echo $_SESSION['nombres']; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="salir.php">Salir</a>
            </li>
            
            
          </ul>
          
        </div>
      </nav>
      <br>
          <div>
            <h2 class="titulo text-center container">Facturacion</h2>
          </div>
          <br><br>
          <form method="post" action="../pdf/pruebacode.php" class="formularioFacturacion">
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
        
    </div>
              
              <br>
              <div class="container text-center">
                  <label>Periodo De Facturacion</label>
              </div>
              <div>
                <select name="mes" class="form-control">
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
              </div>
                <div class="text-center">
                    <br>
                    <button type="submit" name="imprimir1" class="btn btn-primary">Imprimir</button>
                    <button type="submit" name="imprimirt" class="btn btn-success">Imprimir Todos</button>
                 </div>
          </form>

        </body>
        </html>