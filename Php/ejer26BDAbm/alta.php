<?php 


	define("SERVER" , "localhost");
	define("USUARIO", "nminnicelli_nico");
	define("PASS", "nicolasbd");
	define("BASE", "nminnicelli_vinos");


	//creo conexion con el servidor
	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	//si la conexion falla emite un cartel
	if($conexion->connect_errno<>0){
		$puntero = fopen("./errores.log","a");
		fwrite($puntero,"fallo la conexion de la base de datos: ");
		fwrite($puntero,$conexion->connect_errno . " ");
		$fecha=date("Y-m-d");
		fwrite($puntero,date("Y-m-d H-i");
		fwrite($puntero,"\n");

		fclose($puntero);
		die();
		
	}

	//variables del input
	/**/
	$marca = $_GET['marcaV'];
	$nombre = $_GET['nombreV'];
	$origen = $_GET['paisV'];
	$varietal = $_GET['varietalV'];
	//$orden = $_GET['orden'];

	//creo la conexion con la base de datos que voy a  usar
	$sql = "SELECT * FROM `Vitivinicultura`";

	if(!($conexion->query($sql))){
		$puntero = fopen("./errores.log","a");
		fwrite($puntero,"fallo la conexion de la base de datos: ");
		fwrite($puntero,$conexion->error . " ");
		$fecha=date("Y-m-d");
		fwrite($puntero,date("Y-m-d H-i");
		fwrite($puntero,"\n");

		fclose($puntero);
		die();
		
	}

	//preparacion
	if(!( $sentencia = $conexion->prepare("insert into Vitivinicultura (Nombre,Codigo,PaisDeOrigen,Varietal) values (?,?,?,?) "))){
		echo "Falló la preparación: (" . $conexion->errno . ") " . $conexion->error;
	}

	//asigno los valores 
	if(!$sentencia->bind_param('ssss', $nombre, $marca, $origen, $varietal)) {
		echo "Falló la vinculacion de parametros : (" . $sentencia->errno . ") " . $sentencia->error;
	}

	//ejecuto el alta
	if(!$sentencia->execute()){
		echo "Falló la ejecucion : (" . $sentencia->errno . ") " . $sentencia->error;
	}
	else {
		echo "Se agrego el producto correctamente";
	}



	//cierro la conexion con la base de datos
	$conexion->close();


 ?>