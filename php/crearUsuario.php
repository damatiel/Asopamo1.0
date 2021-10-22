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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!--Boostrap JS-->
     <script src="../js/jquery-3.5.1.min.js"></script>
     <script src="../js/popper.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
    <!--C-->
    <link rel="stylesheet" href="../css/main.css">
</body>
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
            <a class="nav-link" href="internet.php">Internet</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="pagos.php">Pagos</a>
        </li>
        
        
        <li class="nav-item dropdown">
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
            <a class="nav-link" href="#">Salir</a>
        </li>
        
        
      </ul>
      
    </div>
  </nav>
  <br>
  
        <h2 class="titulo text-center">Crear Usuario</h2>
      </div>
      <br>
      <form method ="POST" class="formularioCrearUsuario" action="CrearUsuario.php">
      <div class="container form-group">
      <div class="gridPagos">
              <div class="text-center p-1">
                <label class="float-left">Documento</label>
              </div>
              <div>
                <input type="number" class="form-control float-left" name="txtDocumento" autofocus placeholder="Documento">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" name="btnValidar">Validar</button>
                
              </div>
         </div>
        </div>
        </form>
        <?php 
            if (isset($_POST["btnValidar"])) {

              $documento = $_POST['txtDocumento'];
                $query = "SELECT * FROM usuarios WHERE documento = $documento";
                $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
            if ($fila = mysqli_fetch_array($query_exec)) {?> 
            <form method = "POST" class="formularioCrearUsuario" action="gesUsuarios.php" >
            <input type="hidden" name="documentoRegistro" value="<?php echo $documento; ?>" />
        <div class="container form-group">
            <div>
                <label>Nombres</label>
                <input type="text" class="form-control" name="txtNombres" value = <?php echo $fila[1];?>>
            </div>
        </div>
        <div class="container form-group">
            <div> 
                <label>Apellidos</label>
                <input type="text" class="form-control" name="txtApellidos" value = <?php echo $fila[2];?>>
            </div>
        </div>
        <div class="container form-group ">
            <div> 
                <label>Usuario</label>
                <input type="text" class="form-control" name="txtUsuario" value = <?php echo $fila[4];?>>
            </div>
        </div>
        <div class="container form-group ">
            <div> 
                <label>Contraseña</label>
                <input type="text" class="form-control" name="txtContraseña" value = <?php echo $fila[5];?>>
            </div>
        </div>
        <div class="container form-group">
        <?php 
          if($fila[3] == 1){
        ?>
          <label>Tipo De Usuario</label>
          <select class="form-control" name="select">
          <option value = "1">Administrador</option>
          <option value = "0">Usuario</option>
          </select>
          <?php } else{ ?>
            <label>Tipo De Usuario</label>
          <select class="form-control" name="select">
          <option value = "0">Usuario</option>
          <option value = "1">Administrador</option>
          </select>
          <?php } ?>
        </select>
        </div>
        <br>
        <div class="container form-group text-center">
            <button type="submit" class="btn btn-info" name = "btnActualizar">Actualizar</button>
            <button type="submit" class="btn btn-danger" name = "btnEliminar">Eliminar</button>
        </div>
        </form>
        <?php }else{?>
          <form method = "POST" class="formularioCrearUsuario" action="registrarUsuarios.php">
          <input type="hidden" name="documentoRegistro" value="<?php echo $documento; ?>" />
        <div class="container form-group">
            <div>
                <label>Nombres</label>
                <input type="text" class="form-control" name="txtNombres" placeholder="Nombres">
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
        <div class="container form-group">
        <label>Tipo De Usuario</label>
        <select class="form-control" name="select">
          <option value = "1">Administrador</option>
          <option Value = "0">Usuario</option>
        </select>
        </div>
        <br>
        <div class="container form-group text-center">
            <button type="submit" class="btn btn-success" name ="btnRegistrar">Registrar</button>
           
        </div>
        </form>
       <?php } }?>
        
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

</html>