
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inisio Sesion</title>
    <!--Boostrap-->
    <!--Boostrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!--Boostrap JS-->
     <script src="../js/jquery-3.5.1.min.js"></script>
     <script src="../js/popper.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
    <!--C-->
    <link rel="stylesheet" href="../css/main.css">
    <!--Iconos-->
    <link rel="stylesheet" href="css/solid.css">
    <script src="js/all.js"></script>
    <!--C-->
    <link rel="stylesheet" href="css/sesion.css">
</head>
<body>
    
    <div class="container text-center" >
       <div class="col-sm-8 formulario">
            <div class="contenedor">
                <div class="col-12 avatarSesion" >
                    <img src="img/avatarSesion.png" alt="">
                </div>
                <form method="POST" action="php/env_log.php" class="col-12">
                    <div class="form-group">
                        <div class="icono"><i class="fas fa-user"></i> </div>
                        <input type="text" class="form-control text-center" name="txtUsuario" id="txtUsuario" placeholder="Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <div class="icono"><i class="fas fa-lock"></i> </div>
                        <input type="password" class="form-control text-center" name="txtPassword" id="txtPassword" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary boton" name="btnInicio"><i class="fas fa-sign-in-alt"></i> Entrar</button>
                </form>
            </div>
       </div>
    </div>
</body>
</html>
