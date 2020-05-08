
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inisio Sesion</title>
    <!--Boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
