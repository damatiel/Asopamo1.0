 <?php 
 
 class DB_CONNECT
 {
 	function __construct()
	{
		$this->conectar();
	}
 	
 	function conectar()
 	{
 		require_once __DIR__ . '/conectar_Mysql.php';

 		$conexion = mysqli_connect(host,user,pass,bd)or die("no se pudo establecer conexion");
 		return $conexion;
 	}
 	function cerrar()
 	{
 		mysqli_close($this->conectar());

 	}
 }

  ?>