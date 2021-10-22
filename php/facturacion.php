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
            <h2 class="titulo text-center container">Facturacion</h2>
          </div>
          <br><br>
          <div class="gridFacturacion">
          <div class="border-right">
          <form method="post" action="../pdf/pruebacode.php" class="formularioFacturacion">
          <!--Inicio Primero-->  
         
          <div class="text-center"><h6>Consultar Factura Individual</h6></div>
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
      <div>
        <input type="text" name="numero3_direc" class="form-control" maxlength="3" id="txt" style="text-transform:uppercase;" placeholder="">
      </div>
        
    </div>
    <div class="container">
      <label>Consulta Por ID</label>
    </div>
    <div class="container">
    <input type="number" name="IdPunto" class="form-control" placeholder="ID Punto">
    </div>
    <br>
    <div class="text-center">
    <button type="submit" name="imprimir1" class="btn btn-success">Imprimir</button>
    </div>
    </div>   
    <!--Fin Primero-->   
    <!--Inicio Segundo-->   
    <div class="border-right">
      <div class="text-center"><h6>Generar Facturas</h6></div>
    <div class="container">
    <label>Periodo De Facturacion</label>
    
    </div>
    <div class="container">
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
                <div class="container"><label>Fecha Limite Pago</label></div>
                <div class="form-group">
                  <input type="date" class="form-control documentoSuscriptor" name="fmes" >
                </div>
                <div class="container"><label>Rango para generar</label></div>
                <div class="gridRango">
              <div class="ml-2 mr-1">
                <input type="number" name="num_inicial" class="form-control" maxlength="3" id="txt" placeholder="Desde">
              </div>
              <div class="ml-1 mr-2">
                <input type="number" name="num_final" class="form-control" maxlength="1" id="txt" placeholder="Hasta">
              </div>
              </div>
                <div class="text-center">
                    <br>
                    <button type="submit" name="imprimirt" class="btn btn-success">Generar Facturas</button>
                 </div>
                 
          </form>
          </div>
          <!--Fin Segundo-->
          <!--Inicio Tercero-->
          <div class="">
          <form method="post" action="../pdf/prueba2.php" class="formularioFacturacion">
            
              <div class="text-center"><h6>Impresion</h6></div>
              <div class="container">
                  <label>Periodo De Facturacion</label>
              </div>
              <div class="container">
                <select name="mes_num" class="form-control">
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
              <div class="container">
              <label class="text-center">Fecha Limite Pago</label>
              </div>
                <div class="form-group ml-2 mr-2">
                  <input type="date" class="form-control documentoSuscriptor" name="ultimodia_num" >
                </div>
            <div class="text-center">
            <button type="submit" name="fact4" class="btn btn-success">Excel sin internet</button>
            <button type="submit" name="fact5" class="btn btn-success">Excel con internet</button><br><br>
            <button type="submit" name="fact3" class="btn btn-success">cortes sin internet</button>
            <button type="submit" name="fact6" class="btn btn-success">cortes con internet</button>
            <button type="submit" name="fact2" class="btn btn-success">Imprimir</button>
            </div>
           
            
          </form>
          </div> <!--a-->
          <!-- Fin Tercero-->
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