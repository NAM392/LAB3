<link rel="icon" href="../../Argentina-icon.ico">
<h3>Todo lo escrito fuera de las marcas de php es entregada en la respuesta http sin pasar por el procesador php</h3>

<?php 

echo "<p> Todo texto y/o html  <span style='color:blue' > entregado por el procesador php </span> usando la sentencia echo</p>";

echo "<hr></hr>";

$mivariable = "valor1";

echo "<h4> Sin usar concatenador  <span style='color:blue' > \$mivariable </span> : $mivariable</h4>";


echo "<h4> Usando concatenador  <span style='color:blue' > \$mivariable </span> : </h4>".$mivariable;


echo "<hr></hr>";
$mivariable = true;


echo "<h4>variable de tipo logica(verdadera) <span style='color:blue' > \$mivariable </span>  : $mivariable</h4>";

$mivariable = false;

echo "<h4>variable de tipo logica(falso) <span style='color:blue' > \$mivariable </span>  : $mivariable</h4>";

echo "<hr></hr>";

define("MICONSTANTE" , "valorConstante");

echo "<h3><span style='color:blue' >MICONSTANTE</span> :</h3>"; echo(MICONSTANTE) ;


echo "Tipo <h3><span style='color:blue' >MICONSTANTE</span> : </h3> "; echo(gettype(MICONSTANTE));

echo "<hr></hr>";

echo "<h3>Arreglos : </h3>";

$aPalabra=[];
$aPalabra = ["hola","hello"];

echo "<h3><span style='color:blue' >\$aPalabra[0]</span> :   $aPalabra[0] </h3>" ;

echo "<h3><span style='color:blue' >\$aPalabra[1]</span> :   $aPalabra[1] </h3>" ;

echo "<h3>Tipo de <span style='color:blue' >\$aPalabra[]</span> : $aPalabra  </h3> ";

array_push($aPalabra, "ciao");
array_push($aPalabra, "bonjour");

echo"<h4> Se agrego por programa dos elementos nuevos </h4>";

echo "<h2>Todos los elementos originales y agregados </h2>";

foreach ($aPalabra as $Palabra) {
	echo "<h4><li>". $Palabra ."</li></h4>";
}

//probar asignadoles array adentro de array

$aDiccionarioBasico = [] ;

$aDiccionarioBasico [0][0] = "Español" ;

$aDiccionarioBasico [1][0] = "Ingles";

$aDiccionarioBasico [2][0] = "Italiano";

$aDiccionarioBasico [3][0] = "Frances";

//ingles

$aDiccionarioBasico [0][1] = "hola" ;

$aDiccionarioBasico [1][1] = "hello";

$aDiccionarioBasico [2][1] = "ciao";

$aDiccionarioBasico [3][1] = "bonjour";

//italiano

$aDiccionarioBasico [0][2] = "adios" ;

$aDiccionarioBasico [1][2] = "good bye";

$aDiccionarioBasico [2][2] = "arrivederci";

$aDiccionarioBasico [3][2] = "au revoir";


//frances

$aDiccionarioBasico [0][3] = "casa" ;

$aDiccionarioBasico [1][3] = "house";

$aDiccionarioBasico [2][3] = "casa";

$aDiccionarioBasico [3][3] = "maison";



echo "<h2>Arreglo en dos dimendiones </h2>";

echo "<h3> La variable \$aDiccionarioBasico tiene el siguiente tipo : " . gettype($aDiccionarioBasico) . "</h3>";

echo "<table>";

for ($i=0; $i < 4; $i++) { 
	
	echo "<tr style='border: solid'>";
	echo "<td style='background-color:lightblue' >" . $aDiccionarioBasico[0][$i] . "</td> ";
	echo " ";
	echo "<td style='background-color:lightblue' >" . $aDiccionarioBasico[1][$i] . "</td> ";
	echo " ";
	echo "<td style='background-color:lightblue' >" . $aDiccionarioBasico[2][$i] . "</td> ";
	echo " ";
	echo "<td style='background-color:lightblue' >" . $aDiccionarioBasico[3][$i] . "</td> ";
	echo " ";

	echo "<tr style='border: solid'>";

}


echo "</table>";


echo "<h3>Tambien asi se puede expresar el valor del \$aDiccionarioBasico[1][3] : " . $aDiccionarioBasico[1][3] . "</h3>";


echo "<h3>Cantidad e elementos del \$aDiccionarioBasico : " . count($aDiccionarioBasico) . "</h3>" ;



echo "<h2> Variables tipo arreglo asociativo </h2>";


$ProductosAsoc = ["Codigo de Articulo"=>"cp001","Descripcion del Articulos"=>"jugos","Precio Unitario"=>20,"Cantidad"=>2];

foreach ($ProductosAsoc as $key => $value) {
		echo "<h4>" . $key . " : " . $value . "</h4>";
}

echo "<br>";

echo "<h4>Cantidad de elementos : " . count($ProductosAsoc) . "</h4>";

echo "<h4>Tipo de dato : " . gettype($ProductosAsoc) . "</h4>";


echo "<hr></hr>";


echo "<h4>Expresiones aritmeticas</h4>";

$a = 3;
$y = 4;

echo "<h4>la variable \$a tiene un valor de : " . $a . "</h4>";


echo "<h4>la variable \$y tiene un valor de : " . $y . "</h4>";



echo "<h4>la variable \$a es de tipo : " . gettype($a) . "</h4>";


echo "<h4>la variable \$y es de tipo : " . gettype($y) . "</h4>";


$z = ( $a  + $y );
echo "<h4>Asi se escribe una expresion aritmetica por ejemplo de Suma : \$z = ( \$a  + \$y ) : " . $z . "</h4>";

$z = ( $a  - $y );
echo "<h4>Asi se escribe una expresion aritmetica por ejemplo de Resta : \$z = ( \$a  - \$y ) : " . $z . "</h4>";


$z = ( $a * $y );
echo "<h4>Asi se escribe una expresion aritmetica por ejemplo de Multiplicacion : \$z = ( \$a  * \$y ) : " . $z . "</h4>";

$z = ( $a / $y );
echo "<h4>Asi se escribe una expresion aritmetica por ejemplo de Division : \$z = ( \$a  / \$y ) : " . $z . "</h4>";

echo "<hr></hr>";



 ?>