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
	$sql = "SELECT * FROM `Vitivinicultura` WHERE Nombre='$nombre';";


	//si falla la conexion , la corto  .. tambien asigno $resultado a la conexion de la BD
	if(!( $resultado = $conexion->query($sql))){
		die($conexion->error);
	}

	//variable con la cantidad de registros
	$cuenta = $resultado->num_rows;

		//creo una variable local de tipo array
	$vinitos=[];

	//recorro los resultados y los agrego en el array
	while($fila=$resultado->fetch_assoc()){
		$objVinos=new stdClass();
		$objVinos->Nombre=$fila['Nombre'];
		$objVinos->Codigo=$fila['Codigo'];
		$objVinos->PaisDeOrigen=$fila['PaisDeOrigen'];
		$objVinos->Varietal=$fila['Varietal'];

		array_push($vinitos, $objVinos);
	}

	//creo un array nuevo que va a contener el array completo y la cantidad de elementos
	$objTodosVinos = new stdClass();
	$objTodosVinos->Vinos=$vinitos;
	$objTodosVinos->cuenta=$cuenta;

	//creo una variable que va a contener el JSON de todo lo que extraje de la BD
	
	$salidaJSON = json_encode($objTodosVinos);

	//cierro la conexion con la base de datos
	$conexion->close();


	//muestro el resultado
	echo $salidaJSON;


 ?>



