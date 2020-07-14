<?php 
session_start();
if(!isset($_SESSION['ejercicio'])){
	header('location:../formularioDeLogin.html');
	exit();
}


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