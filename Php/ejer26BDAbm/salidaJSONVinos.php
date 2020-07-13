<?php 

	include("./BaseDatos.inc");
	
	//creo conexion con el servidor
	$conexion = new mysqli(SERVER,USUARIO,PASS,BASE);

	//si la conexion falla emite un cartel
	if($conexion->connect_errno){
		echo "Fallo la conexion" . $conexion->connect_errno; 
	}
	//variables del input
	/**/
	$marca = $_GET['marcaV'];
	$nombre = $_GET['nombreV'];
	$origen = $_GET['paisV'];
	$varietal = $_GET['varietalV'];
	$orden = $_GET['orden'];


	//creo la conexion con la base de datos que voy a  usar
	$sql = "SELECT * FROM `Vitivinicultura` WHERE  ";

	//filtros
	
	$sql = $sql."Codigo like '%" . $marca ."%' and ";
	$sql = $sql."Nombre like '%" . $nombre ."%' and ";
	$sql = $sql."PaisDeOrigen like '%" . $origen ."%' and ";
	$sql = $sql."Varietal like '%" . $varietal ."%' ";
	$sql = $sql. " order by ". $orden;


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