<?php 
	require_once __DIR__ . '/conectar.php';
	echo "
	<script >
	function redir (ruta) {
	location.href=ruta;
	}

	</script>";
	$db = new DB_CONNECT();

	$usuario = $_POST['txtUsuario'];

	$passw = $_POST['txtPassword'];

	// $pass = md5($passw);
	
	$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$passw'";

	$query_exec = mysqli_query($db->conectar(),$query)or die("no se puede realizar la consulta");

	if ($fila = mysqli_fetch_array($query_exec)) {

		session_start();


		$_SESSION["autentificado"]= "SI";

		$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

		$_SESSION['usuario']=$fila[3];
		$_SESSION['nombres']=$fila[1];
		$_SESSION['tipo']=$fila[2];


		if ($fila[2]==1) {

				echo "
				<script>
				alert('Administrador');
				redir('pagos.php');
				</script>
				";

			}else{
				echo "
				<script>
				alert('Usuario');
				redir('pagos.php');
				</script>";
			}
}else{
		echo "<script>
		alert('erro de usuario y/o contraseña');
		redir('../index.html');
		</script>";
	}



?>