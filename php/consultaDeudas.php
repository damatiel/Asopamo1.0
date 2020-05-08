<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
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
                <a class="nav-link" href="pagos.php">Pagos</a>
            </li>
            
           
            <li class="nav-item dropdown absolute">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consultas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="ConsultaDeudas.php">Deudas Suscriptores</a>
                <a class="dropdown-item" href="ConsultaPagos.php">Pagos Suscriptores</a>    
                <a class="dropdown-item" href="consultaRecibos.php">Recaudos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Configuracion
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearUsuario.php">Crear Usuario</a>
                
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
            <h2 class="titulo text-center container">Deudas Suscriptores</h2>
          </div>
          <br>
          <form class="container">
              <div class="gridConsultas">
              <div class="container">
            <label>Documento</label>
            <input type="number" class="form-control" id="txtDocumento" placeholder="txtDocumento">
            <br>
            <button type="button" class="btn btn-primary text-center">Buscar</button>
             </div>
             <div>
            <div class="container">
                <div>
                  <label>Direccion</label>
                  <input type="checkbox" class="ml-3">
                  <label class="form-check-label">¿La direccion contiene Letras?</label>
                </div>
                
          
            </div>
              <div class="form-group gridDireccion">
                <div>
                  <select class="form-control">
                    <option>Calle</option>
                    <option>Carrera</option>
                  </select>
                </div>
                <div>
                  <input type="number" class="form-control" id="txt" placeholder="">
                </div>
                <div>
                  <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
                    id="txt" placeholder="ABC">
                </div>
                <div>
                  <input type="number" class="form-control" id="txt" placeholder="">
                </div>
                <div>
                  <input type="text" class="form-control text-center" disabled="disabled" style="text-transform:uppercase;"
                    id="txt" placeholder="ABC">
                </div>
                <div>
                  <input type="number" class="form-control" id="txt" placeholder="">
                </div>
                <div>
                  <br>
                  <button type="button" class="btn btn-primary">Buscar</button>
                </div>
              </div>
            </div>
        </div>
          </form>
          <br>
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
        </body>
        </html>