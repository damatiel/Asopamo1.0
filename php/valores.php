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
      <br>
          <div>
            <h2 class="titulo text-center container">Valores</h2>
          </div>
          <br><br>
          <div class="container formEntPago">
              <form method ="POST" action="valores.php">
                 <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="thnom text-center thConcepto">Concepto</th>
                    <th scope="col" class="text-center thvalor">Valor</th>
                    <th scope="col" class="text-center">Accion</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM valores";
                    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                    while($fila = mysqli_fetch_array($query_exec)){?>
                    <tr>
                    <td class="text-center"><input type="text" class="form-control text-center" name ="<?php echo $fila[0]."C"; ?>" value=<?php echo $fila[1]; ?>></td>
                    <td class="text-center"><input type="text" class="form-control text-center" name ="<?php echo $fila[0]."V"; ?>" value=<?php echo $fila[2]; ?>></td>
                    <td class="container-fluid text-center">
                      <button type="submit" class="btn btn-primary" value = <?php echo $fila[0]; ?> name ="btnActualizar">Actualizar</button>
                      
                    </td>
                    
                    </tr>
                    <?php } ?>
                </tbody>
                <?php if (isset($_POST["btnActualizar"])){
                  $idValor = $_POST['btnActualizar'];
                  $concepto = $_POST[$idValor."C"];
                  $valor = $_POST[$idValor."V"];
                  $query = "UPDATE valores set concepto = '$concepto', valor = $valor WHERE id = $idValor";
                  $query_exec = mysqli_query($db->conectar(),$query)or die("No se pudo conectar");
                  echo "<script> location.href ='valores.php'; </script>";
                }else if(isset($_POST["btnEliminar"])){
                  $idValor = $_POST['btnEliminar'];
                  $query = "DELETE FROM valores WHERE id = $idValor";
                  $query_exec = mysqli_query($db->conectar(),$query)or die("<script>
                  alert('Imposible Eliminar. Registros Almacenados Con Esta Entidad');
                  </script>");
                  echo "<script> location.href ='valores.php'; </script>";
                } ?>
              </form>
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