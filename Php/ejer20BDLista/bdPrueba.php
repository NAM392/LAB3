

<?php

	echo "BASE DE DATOS";
	echo "<br>";
	echo "<br>";
	define("SERVER" , "localhost");
	define("USUARIO", "root");
	define("PASS", "probando");
	define("BASE", "ejercicio");

	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
	}

	//$sql = "select * vitivinicultura ";
	$sql = "SELECT * FROM `vitivinicultura`";

	//$resultado = $conexion->query($sql);

	if(!( $resultado = $conexion->query($sql))){
		die($conexion->error);

	}

	while($fila=$resultado->fetch_assoc()){
		echo "<table><tr><td>";
		//$objVinos = new stdClass();
		//$objVinos->Codigo=$fila['Codigo'];
		echo $fila ['Nombre'] . "</td><td>";
		echo $fila ['Codigo'] . "</td><td>";
		echo $fila ['PaisDeOrigen']  . "</td><td>";
		echo $fila ['Varietal'] . "</td><td></tr></table>";

		echo "<br>";
		echo "<br>";
	}

	//$objVinos = new stdClass();
	//$objVinos->Codigo

	$conexion->close();


?>