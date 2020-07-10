<?php 



	include("./BaseDatos.inc");

	//creo conexion con el servidor
	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	//si la conexion falla emite un cartel
	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
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

	echo "<p><button onclick=\"location.href = './app_modulo/ejer26BDAbm.html'\"> Ingrese a la aplicacion </button></p>";

	echo "<p><button onclick=\"location.href = './destruirSesion.php'\"> Terminar sesion</button></p>";




 ?>