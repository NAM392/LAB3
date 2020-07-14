<?php 



	include("./BaseDatos.inc");

	//creo conexion con el servidor
	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	//si la conexion falla emite un cartel
	if($conexion->connect_errno<>0){
		$puntero = fopen("./errores.log","a");
		fwrite($puntero,"Fallo conexion base de datos");
		fwrite($puntero,$conexion->connect_errno . "");

		$fecha=date("Y-m-d");
		fwrite($puntero,date("Y-m-d-H-i") . "");
		fwrite($puntero,"\n");

		fclose($puntero);
		die();
		
	}

	//variables del input
	$usuario = $_GET['usuario'];
	$password = md5($_GET['password']);



	//creo la conexion con la base de datos que voy a  usar
	$sql = "SELECT * FROM `ingresos` ";


	//si falla la conexion , la corto  .. tambien asigno $resultado a la conexion de la BD
	if(!( $resultado = $conexion->query($sql))){
		die($conexion->error);
	}

	//variable resultante
	$resultante = false ;

	//recorro los resultados y los agrego en el array
	while($fila=$resultado->fetch_assoc()){
		
		if(($usuario == $fila['usuario'] ) && ($password == $fila['pass'] )){
			$resultante = true;

		}
		
	}

	//cierro la conexion con la base de datos
	$conexion->close();

	//echo $resultante;
	//muestro el resultado
	if(!$resultante){
		echo "<p><button onclick=\"location.href = './destruirSesion.php'\"> Ingreso Invalido</button></p>";
		exit();
	}

	session_start();
	$_SESSION['ejercicio'] = session_id();
	$_SESSION['usuario'] = $usuario;

	echo "USUARIO : $usuario <br><br>";
	echo "ID de Sesion : " . $_SESSION['ejercicio'] . " <br>";
	echo "<br><br><br>";

	echo "<p><button onclick=\"location.href = './app_modulo/ejerABM.php'\"> Ingrese a la aplicacion </button></p>";
	echo "<br><br><br>";
	echo "<p><button onclick=\"location.href = './destruirSesion.php'\"> Terminar sesion</button></p>";




 ?>