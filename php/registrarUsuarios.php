<?php
require_once __DIR__ . '/conectar.php';
echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
    $db = new DB_CONNECT();
    if (isset($_POST["btnRegistrar"])) {
        $documento = $_POST['documentoRegistro'];
        $nombres = $_POST['txtNombres'];
        $apellidos = $_POST['txtApellidos'];
        $usuario = $_POST['txtUsuario'];
        $password = $_POST['txtContraseña'];
        $tUsu = $_POST['select'];
        
        $query ="INSERT INTO usuarios (documento,nombre,apellidos,tipo,usuario,pass) VALUES ($documento,'$nombres','$apellidos',$tUsu,'$usuario','$password')";
        $query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
          }
          echo "
				<script>
				alert('Usuario agregado');
				redir('crearUsuario.php');
				</script>
				";

?>