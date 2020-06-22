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
              <a class="dropdown-item" href="consultaRecaudos.php">Recaudos</a>
              <a class="dropdown-item" href="ConsultaPuntos.php">Puntos</a>
              <a class="dropdown-item" href="consultaSuscriptores.php">Suscriptores</a>
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
      <div class="float-right text-center">
        <form method = "post" action = "excel.php">
          <button type="submit" name="excel_puntos" class="btn btn-primary">Exportar a Excel</button>
        </form>
        </div>
          <div>
            <h2 class="titulo text-center container">Consulta Puntos</h2> 
          </div>
          <br>
          <div class="container text-center">
            <form method = "POST" action="#">
              <div class="gridConSuscriptores">
                <div class="mr-2">
                <input type="number" class="form-control" name="txtDoc" placeholder="Consulta Por Documento">
                </div>
                <div class="mr-2 ml-2 ">
                <input type="tetxt" class="form-control" name="txtNom" placeholder="Consulta Por Nombre">
                </div>
                <div class="mr-2 ml-2 ">
                <input type="tetxt" class="form-control" name="txtApe" placeholder="Consulta Por Apellido">
                </div>
                <div class="ml-2">
                <button type="submit" name ="btnBuscar" class="btn btn-primary">Buscar</button>
                </div>
              </div>
              </form>
          </div>
          <br><br>
          <?php 
           
          ?>
          <div class="container ">
            
            <div class="table-wrapper-scroll-y my-custom-scrollbar" style = "height: 400px;">
          
          <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">ID Punto</th>
                    <th scope="col" class="text-center">Documento</th>
                    <th scope="col" class="text-center">Nombre</th>
                    <th scope="col" class="text-center">Apellido</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Direccion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   if (isset($_POST["btnBuscar"])){
                    $doc = $_POST['txtDoc'];
                    $nom = $_POST['txtNom'];
                    $ape = $_POST['txtApe'];
                     if(!empty($doc)){
                      $query1 = "SELECT * FROM puntos WHERE doc_suscriptor = $doc";
                      $query_exec1 = mysqli_query($db->conectar(),$query1)or die("no se puede realizar la consulta");
                      $query2 = "SELECT * FROM suscriptores WHERE doc = $doc";
                      $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                      $fila2 = mysqli_fetch_array($query_exec2);
                      while($fila1 = mysqli_fetch_array($query_exec1)){ 
                        
                        ?>
                      <tr>
                    <td class="text-center"><?php echo $fila1[0]; ?></td>
                    <td class="text-center"><?php echo $fila1[3]; ?></td>
                    <td class="text-center"><?php echo $fila2[1]; ?></td>
                    <td class="text-center"><?php echo $fila2[3]; ?></td>
                    <?php 
                    $estado = $fila1[2];
                      if($estado == 2){?>
                         <td class="text-center"><?php echo "Activo"; ?></td>
                      <?php } elseif($estado == 1){ ?>
                        <td class="text-center"><?php echo "Deudor"; ?></td>
                      <?php } elseif($estado == 3){ ?>
                        <td class="text-center"><?php echo "Bloqueado por Mora"; ?></td>
                      <?php } elseif ($estado == 4) {?>
                        <td class="text-center"><?php echo "Bloqueado"; ?></td>
                         <?php } elseif ($estado == 5) {?>
                        <td class="text-center"><?php echo "Bloqueado Especial"; ?></td>
                     <?php } ?>
                    <td class="text-center"><?php echo $fila1[1].' '.$fila1['indicaciones']; ?></td>
                      </tr>
                      <?php } ?>
                      <?php
                     }else if(!empty($nom)){
                      $query1 = "SELECT * FROM suscriptores WHERE primer_nom = '$nom'";
                      $query_exec1 = mysqli_query($db->conectar(),$query1)or die("no se puede realizar la consulta");
                      
                    while($fila1 = mysqli_fetch_array($query_exec1)){ 
                      $docNom = $fila1[0];
                      
                      $query2 = "SELECT * FROM puntos WHERE doc_suscriptor = $docNom";
                      $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                     while($fila2 = mysqli_fetch_array($query_exec2)){
                      ?>
                    <tr>
                      <td class="text-center"><?php echo $fila2[0]; ?></td>
                  <td class="text-center"><?php echo $fila1[0]; ?></td>
                  <td class="text-center"><?php echo $fila1[1]; ?></td>
                  <td class="text-center"><?php echo $fila1[3]; ?></td>
                  <?php 
                  $estado = $fila2[2];
                  
                    if($estado == 2){?>
                         <td class="text-center"><?php echo "Activo"; ?></td>
                      <?php } elseif($estado == 1){ ?>
                        <td class="text-center"><?php echo "Deudor"; ?></td>
                      <?php } elseif($estado == 3){ ?>
                        <td class="text-center"><?php echo "Bloqueado por Mora"; ?></td>
                      <?php } elseif($estado == 4){ ?>
                        <td class="text-center"><?php echo "Bloqueado"; ?></td>
                        <?php } elseif ($estado == 5) {?>
                        <td class="text-center"><?php echo "Bloqueado Especial"; ?></td>
                      <?php } ?>
                  <td class="text-center"><?php echo $fila2[1].' '.$fila2['indicaciones']; ?></td>
                  
                    </tr>
                    <?php }}  ?>
                    <?php 
                     }else if(!empty($ape)){
                      $query1 = "SELECT * FROM suscriptores WHERE primer_ape = '$ape'";
                      $query_exec1 = mysqli_query($db->conectar(),$query1)or die("no se puede realizar la consulta");
                      
                    if($fila1 = mysqli_fetch_array($query_exec1)){ 
                      $docNom = $fila1[0];
                      $query2 = "SELECT * FROM puntos WHERE doc_suscriptor = $docNom";
                      $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                     while($fila2 = mysqli_fetch_array($query_exec2)){
                      ?>
                    <tr>
                  <td class="text-center"><?php echo $fila2[0]; ?></td>
                  <td class="text-center"><?php echo $fila1[0]; ?></td>
                  <td class="text-center"><?php echo $fila1[1]; ?></td>
                  <td class="text-center"><?php echo $fila1[3]; ?></td>
                  <?php 
                 
                  $estado = $fila2[2];
                    if($estado == 2){?>
                       <td class="text-center"><?php echo "Activo"; ?></td>
                    <?php } else{ ?>
                      <td class="text-center"><?php echo "Cancelado"; ?></td>
                    <?php } ?>
                  <td class="text-center"><?php echo $fila2[1].' '.$fila2['indicaciones']; ?></td>
                    </tr>
                    <?php
                     } }}
                      

                   }else{
                    $query = "SELECT * FROM puntos";
                    $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
                   while($fila = mysqli_fetch_array($query_exec)){ 
                    $docGeneral = $fila[3];
                    $query2 = "SELECT * FROM suscriptores WHERE doc = $docGeneral";
                      $query_exec2 = mysqli_query($db->conectar(),$query2)or die("no se puede realizar la consulta");
                      $fila2 = mysqli_fetch_array($query_exec2);
                     ?>
                      
                    <tr>
                    <td class="text-center"><?php echo $fila[0]; ?></td>
                    <td class="text-center"><?php echo $fila[3]; ?></td>
                    <td class="text-center"><?php echo $fila2[1]; ?></td>
                    <td class="text-center"><?php echo $fila2[3]; ?></td>
                    <?php 
                    $estado = $fila[2];
                      if($estado == 2){?>
                         <td class="text-center"><?php echo "Activo"; ?></td>
                      <?php } elseif($estado == 1){ ?>
                        <td class="text-center"><?php echo "Deudor"; ?></td>
                      <?php } elseif($estado == 3){ ?>
                        <td class="text-center"><?php echo "Bloqueado por Mora"; ?></td>
                      <?php } elseif($estado == 4){ ?>
                        <td class="text-center"><?php echo "Bloqueado"; ?></td>
                        <?php } elseif ($estado == 5) {?>
                        <td class="text-center"><?php echo "Bloqueado Especial"; ?></td>
                      <?php } ?>
                    <td class="text-center"><?php echo $fila[1].' '.$fila['indicaciones']; ?></td>
                    </tr>
                   <?php } } ?>
                 
                  
                </tbody>
                </div>
                
          </div>


        </body>
        </html>