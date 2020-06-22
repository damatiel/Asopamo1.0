<?php  
  require_once __DIR__ . '/conectar.php';

  $db = new DB_CONNECT();

  session_start();

  if ($_SESSION["autentificado"] != "SI") { 
    //si no está logueado lo envío a la página de autentificación 
    header("Location:../index.php"); 
}
?>
<?php 
          if (isset($_POST["excel"])) {
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=Puntos.xls');
 ?>
 <table>
  <tr>
    <th scope="col" class="text-center">ID Punto</th>
    <th scope="col" class="text-center">Documento</th>
    <th scope="col" class="text-center">Nombre</th>
    <th scope="col" class="text-center">Apellido</th>
    <th scope="col" class="text-center">Estado</th>
    <th scope="col" class="text-center">Direccion</th>
  </tr>
  <?php 
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
                   <?php } ?>
 </table>
 <?php
}
?>