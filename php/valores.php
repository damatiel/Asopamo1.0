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
            <h2 class="titulo text-center container">Valores</h2>
          </div>
          <br><br>
          <div class="container formEntPago">
              <form method ="POST" action="valores.php">
                <div class="gridValores">
                <div class="mr-3">
                <input type="text" class="form-control text-center" name="txtConcepto" placeholder="Concepto">
                </div>
                <div class="ml-3">
                <input type="number" class="form-control text-center" name="txtValor"placeholder="Valor">
                </div>
                <div class="ml-5">
                <button type="submit" class="btn btn-success float-rigth" name ="btnGuardar">Guardar</button>
                </div>
                </div>
                <?php
              if (isset($_POST["btnGuardar"])){
                $concepto = $_POST['txtConcepto'];
                $valor = $_POST['txtValor'];
                $query = "INSERT INTO valores(concepto,valor) VALUES ('$concepto',$valor)";
                $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                echo "<script> location.href ='valores.php'; </script>";
              }

              ?>
                <br><br>
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
                      <button type="submit" class="btn btn-danger" value = <?php echo $fila[0]; ?> name ="btnEliminar">Eliminar</button>
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
          

        </body>
        </html>