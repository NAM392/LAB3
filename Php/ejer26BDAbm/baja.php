<?php 



	define("SERVER" , "localhost");
	define("USUARIO", "nminnicelli_nico");
	define("PASS", "nicolasbd");
	define("BASE", "nminnicelli_vinos");


	//creo conexion con el servidor
	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	//si la conexion falla emite un cartel
	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
	}

	//variables de entrada
	
	
	$nombre = $_GET['nombreDelVino'];
	

	//creo la conexion con la base de datos que voy a  usar
	$sql = "DELETE FROM `Vitivinicultura` WHERE Nombre='$nombre';";



	if(!( $resultado = $conexion->query($sql))){
		$puntero = fopen("./errores.log","a");
		fwrite($puntero,"fallo la conexion de la base de datos: ");
		fwrite($puntero,$conexion->error . " ");
		$fecha=date("Y-m-d");
		fwrite($puntero,date("Y-m-d H-i");
		fwrite($puntero,"\n");

		fclose($puntero);
		die();
		
	}
	else { echo " $nombre se ha borrado";}


	//cierro la conexion con la base de datos
	$conexion->close();


 ?>