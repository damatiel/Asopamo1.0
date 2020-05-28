<?php 
require_once __DIR__ . '/conectar.php';
echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
	$db = new DB_CONNECT();
if (isset($_POST["btnActualizar"])) {
    $documento = $_POST['documentoRegistro'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $usuario = $_POST['txtUsuario'];
    $password = $_POST['txtContraseña'];
    $tUsu = $_POST['select'];
	$query ="UPDATE usuarios SET nombre='$nombres',apellidos='$apellidos',tipo=$tUsu,usuario='$usuario',pass = '$password' WHERE documento = '$documento'";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
echo "
				<script>
				alert('Usuario actualizado');
				redir('CrearUsuario.php');
				</script>
				";

}
if (isset($_POST["btnEliminar"])) {

	$documento = $_POST['documentoRegistro'];
	$query ="DELETE FROM usuarios WHERE documento = $documento";
	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");
	echo "
		<script>
			alert('Usuario eliminado');
			redir('CrearUsuario.php');
		</script>
	";
}

 ?>