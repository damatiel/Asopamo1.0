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
    <title>Crear Usuario</title>
</head>
<body>
    <!--Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <!--Boostrap JS-->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--C-->
    <link rel="stylesheet" href="../css/main.css">
</body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse bg-primary";" id="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="suscriptores.html">Suscriptores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="puntos.html">Puntos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Facturacion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pagos.html">Pagos</a>
        </li>
        
        
        <li class="nav-item dropdown">
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
        <h2 class="titulo text-center">Crear Usuario</h2>
      </div>
      <form method ="POST" class="formularioCrearUsuario" action="crearUsuario.php">
          
        <div class="container form-group">
            <div> 
                <label>Documento</label>
                <input type="number" class="form-control" name="txtDocumento" placeholder="Documento">
            </div>
        </div>
        <div class="container form-group">
            <div>
                <label>Nombres</label>
                <input type="text" class="form-control" name="txtNnombres" placeholder="Nombres">
            </div>
        </div>
        <div class="container form-group">
            <div> 
                <label>Apellidos</label>
                <input type="text" class="form-control" name="txtApellidos" placeholder="Apellidos">
            </div>
        </div>
        <div class="container form-group ">
            <div> 
                <label>Usuario</label>
                <input type="text" class="form-control" name="txtUsuario" placeholder="Usuario">
            </div>
        </div>
        <div class="container form-group ">
            <div> 
                <label>Contraseña</label>
                <input type="text" class="form-control" name="txtContraseña" placeholder="Contraseña">
            </div>
        </div>
        <br>
        <div class="container form-group text-center">
            <button type="button" class="btn btn-success">Registrar</button>
            <button type="button" class="btn btn-info">Actualizar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>
    </form>


</html>