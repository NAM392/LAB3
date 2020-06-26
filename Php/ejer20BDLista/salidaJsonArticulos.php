<?php 


	//include("./datosConexionBase.inc");
	define("SERVER" , "nicolasminnicelli.com.ar");
	define("USUARIO", "nminnicelli_nico");
	define("PASS", "nicolasbd");
	define("BASE", "nminnicelli_vinos");


	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

		die($conexion->error);

	}

	$vinitos=[];
	while($fila=$resultado->fetch_assoc()){
		
		$objVinos = new stdClass();
	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
	}

	$sql = "SELECT * FROM `vitivinicultura`";

	if(!( $resultado = $conexion->query($sql))){
		$objVinos->Codigo=$fila['Codigo'];
		$objVinos->Nombre=$fila['Nombre'];
		$objVinos->PaisDeOrigen=$fila['PaisDeOrigen'];
		$objVinos->Varietal=$fila['Varietal'];

		array_push($vinitos,$objVinos);
	}

	$CantidadRegistros = $resultado->num_rows;

	$objTodosVinos = new stdClass();
	$objTodosVinos->Vinos=$vinitos;
	$objTodosVinos->cuenta=$CantidadRegistros;

	$salidaJSON = json_encode($objTodosVinos);

	$conexion->close();


	echo $salidaJSON;











 ?>