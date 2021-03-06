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
	//variables del input
	$marca = $_GET['marcaV'];
	$nombre = $_GET['nombreV'];
	$origen = $_GET['paisV'];
	$varietal = $_GET['varietalV'];
	

	//creo la conexion con la base de datos que voy a  usar
	$sql = "SELECT * FROM `Vitivinicultura`";

	if(!( $conexion->query($sql))){
		echo "Falló la conexion: (" . $conexion->errno . ") " . $conexion->error;
	}



		//preparacion
	if(!( $sentencia = $conexion->prepare("update Vitivinicultura set Nombre=?,Codigo=?,PaisDeOrigen=?,Varietal=? where Nombre=?;"))){
		echo "Falló la preparación: (" . $conexion->errno . ") " . $conexion->error;
	}

	//asigno los valores 
	if(!$sentencia->bind_param('sssss', $nombre, $marca, $origen, $varietal,$nombre)) {
		echo "Falló la vinculacion de parametros : (" . $sentencia->errno . ") " . $sentencia->error;
	}


	//ejecuto el alta
	if(!$sentencia->execute()){
		echo "Falló la ejecucion : (" . $sentencia->errno . ") " . $sentencia->error;
	}
	else {
		echo "Se Modifico el Vino  ". $nombre ." correctamente <br>";
		echo "Bodega : ". $marca ."<br>";
		echo "Origen : " . $origen . "<br>";
		echo "Varietal : " .$varietal . "<br>" ;
	}



	//cierro la conexion con la base de datos
	$conexion->close();


 ?>