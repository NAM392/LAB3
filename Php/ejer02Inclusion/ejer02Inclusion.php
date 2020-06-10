<link rel="icon" href="../../Argentina-icon.ico">
<?php 


echo "<h2>En este ejemplo de utiliza la funcion include() que ubica codigo php definido en el archivo ejemplo2.inc : ";

echo "<h2>Antes de insertar el include las variables declaradas en el mismo no existen </h2>";
echo "<h4>La longitud el arreglo es : " . count($Liquidacion);

echo "<table>";

foreach ($Liquidacion as $key => $value) 
 { 
	
	echo "<tr style='border: solid'>";
	echo "<td style='background-color:lightblue' >" . $key . "</td> ";
	echo " ";
	echo "<td style='background-color:lightblue' >" . $value . "</td> ";
	echo " ";
	echo "<tr style='border: solid'>";

}


echo "</table>";

echo "<h4>Aqui ya se ejecuto la funcion include() . Cuando se usa iclude ocurre que si el archivo 'inc' no existe , se visualiza un warning y el script sigue ejecutandose hasta el final </h4>";

include("./ejemplo2.inc");

echo "<h4>La longitud el arreglo es : " . count($Liquidacion);
echo "<h4>Las dos variables de tipo asociativa son  </h4>";
echo "<table>";

foreach ($Liquidacion as $key => $value) 
 { 
	
	echo "<tr style='border: solid'>";
	echo "<td style='background-color:lightgrey' >" . $key . "</td> ";
	echo " ";
	echo "<td style='background-color:lightgrey' >" . $value . "</td> ";
	echo " ";
	echo "<tr style='border: solid'>";

}


echo "</table>";
















































 ?>