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
    <title>Suscriptores</title>
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
            <h2 class="titulo text-center container">Suscriptores</h2>
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
                              $query = "SELECT * FROM suscriptores WHERE doc = '$documento'";

                                $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

                                if ($fila = mysqli_fetch_array($query_exec)) {
                                  ?>
                                  <script type="text/javascript">
                                    alert('suscriptor');
                                  </script>
                                  <form method="POST" action="gest_sus.php">
                                        <div class="container form-group">
                                            <div class="container row"> 
                                                <div class="container tamañotxtSuscriptor">
                                                <label>Primer Nombre</label>
                                                <input type="text" class="form-control" name="txtPNnombre" id="txtPNnombre" value=<?php echo $fila['primer_nom']; ?>>
                                                </div>
                                              <div class="container tamañotxtSuscriptor">
                                                <label>Segundo Nombre</label>
                                                <input type="text" class="form-control" name="txtSNnombre" id="txtSNnombre" value=<?php echo $fila['segundo_nom']; ?>>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="container form-group">
                                            <div class="container row"> 
                                                <div class="container tamañotxtSuscriptor"> 
                                                    <label>Primer Apellido</label>
                                                <input type="text" class="form-control" name="txtPApellido" id="txtPApellido" value=<?php echo $fila['primer_ape']; ?>>
                                                </div>
                                              <div class="container tamañotxtSuscriptor">
                                                <label>Segundo Apellido</label>
                                                <input type="text" class="form-control" name="txtSApellido" id="txtSApellido" value=<?php echo $fila['segundo_ape']; ?>>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="container form-group">
                                            <div class="container row"> 
                                                <div class="container tamañotxtSuscriptor"> 
                                                    <label>Direccion</label>
                                                <input type="text" class="form-control" name="txtDireccion" value=<?php echo $fila['direc']; ?> >
                                                </div>
                                              <div class="container tamañotxtSuscriptor">
                                                <label>Telefono</label>
                                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" value=<?php echo $fila['tel']; ?>>
                                                </div>    
                                            </div>
                                        </div>
                                           <br>
                                           <div>
                                             <input type="hidden" name="documento" value="<?php echo $documento; ?>" />
                                           </div>
                                        <div class="container form-group text-center">
                                            <button type="submit" name="submit1" class="btn btn-info">Actualizar</button>
                                            <button type="submit" name="submit2" class="btn btn-danger">Eliminar</button>
                                        </div>
                                      </form>
                                    <?php
                                }else {?>

                                    <script type="text/javascript">
                                    alert('no suscriptor');
                                  </script>
                                  <form id="loginForm" method="POST" action="ing_sus.php">
                                        <div class="container form-group">
                                            <div class="container row"> 
                                                <div class="container tamañotxtSuscriptor">
                                                <label>Primer Nombre</label>
                                                <input type="text" class="form-control" name="txtPNnombre" id="txtPNnombre" placeholder="Primer Nombre">
                                                </div>
                                              <div class="container tamañotxtSuscriptor">
                                                <label>Segundo Nombre</label>
                                                <input type="text" class="form-control" name="txtSNnombre" id="txtSNnombre" placeholder="Segundo Nombre">
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="container form-group">
                                            <div class="container row"> 
                                                <div class="container tamañotxtSuscriptor"> 
                                                    <label>Primer Apellido</label>
                                                <input type="text" class="form-control" name="txtPApellido" id="txtPApellido" placeholder="Primer Apellido">
                                                </div>
                                              <div class="container tamañotxtSuscriptor">
                                                <label>Segundo Apellido</label>
                                                <input type="text" class="form-control" name="txtSApellido" id="txtSApellido" placeholder="Segundo Apellido">
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="container form-group">
                                            <div class="container row"> 
                                                <div class="container tamañotxtSuscriptor"> 
                                                    <label>Direccion</label>
                                                <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion">
                                                </div>
                                              <div class="container tamañotxtSuscriptor">
                                                <label>Telefono</label>
                                                <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="Telefono">
                                                </div>    
                                            </div>
                                        </div>
                                           <br>
                                           <div>
                                             <input type="hidden" name="documento" value="<?php echo $documento; ?>" />
                                           </div>
                                        <div class="container form-group text-center">
                                            <button type="submit" name="submit" class="btn btn-success">Registrar</button>
                                        </div>
                                      </form>
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