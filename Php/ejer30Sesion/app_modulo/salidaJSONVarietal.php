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
	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
	}

	//creo la conexion con la base de datos que voy a  usar
	$sql = "SELECT * FROM `Vitivinicultura` ";

	//si falla la conexion , la corto  .. tambien asigno $resultado a la conexion de la BD
	if(!( $resultado = $conexion->query($sql))){
		die($conexion->error);
	}
		
	//variable con la cantidad de registros
	$cuenta = $resultado->num_rows;

	//creo una variable local de tipo array
	$varietales=[];

	//recorro los resultados y los agrego en el array
	while($fila=$resultado->fetch_assoc()){
		$objVarietal=new stdClass();
		$objVarietal->Varietal=$fila['Varietal'];

		array_push($varietales, $objVarietal);
	}

	//creo un array nuevo que va a contener el array completo y la cantidad de elementos
	$objSoloVarietal = new stdClass();
	$objSoloVarietal->varietales=$varietales;
	$objSoloVarietal->cuenta=$cuenta;

	//creo una variable que va a contener el JSON de todo lo que extraje de la BD
	
	$salidaJSON = json_encode($objSoloVarietal);

	//cierro la conexion con la base de datos
	$conexion->close();


	//muestro el resultado
	echo $salidaJSON;




 ?>