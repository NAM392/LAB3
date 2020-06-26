<?php 


	//include("./datosConexionBase.inc");
	define("SERVER" , "localhost");
	define("USUARIO", "root");
	define("PASS", "probando");
	define("BASE", "ejercicio");


	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
	}

	$sql = "SELECT * FROM `vitivinicultura`";

	if(!( $resultado = $conexion->query($sql))){
		die($conexion->error);

	}

	$vinitos=[];
	while($fila=$resultado->fetch_assoc()){
		
		$objVinos = new stdClass();
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