<?php 



	include("./BaseDatos.inc");


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
		die($conexion->error);
	}
	else { echo " <br><br><li> $nombre  SE HA BORRADO </li>";}


	//cierro la conexion con la base de datos
	$conexion->close();


 ?>