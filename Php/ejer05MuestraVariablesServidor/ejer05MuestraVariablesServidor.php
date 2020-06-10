<link rel="icon" href="../../Argentina-icon.ico">
<?php 




echo "<h2>Variables del servidor</h2>";

echo "<table>";

	echo "<tr style='border: solid ; border-color:black '>";
	echo "<td style='background-color:lightblue' > SERVER_ADDR"  . "  " . $_SERVER['SERVER_ADDR'] . "</td> ";
	echo "<td style='background-color:lightblue' > SERVER_PORT"  . "  " . $_SERVER['SERVER_PORT'] . "</td> ";
	echo "<td style='background-color:lightblue' > SERVER_NAME"  . "  " . $_SERVER['SERVER_NAME'] . "</td> ";
	echo "<td style='background-color:lightblue' > DOCUMENT_ROOT"  . "  " . $_SERVER['DOCUMENT_ROOT'] . "</td> ";
	echo " ";
	echo "<tr style='border: solid'>";

echo "</table>";


echo "<h2>Variables del Cliente</h2>";

echo "<table>";

	echo "<tr style='border: solid ; border-color:black '>";
	echo "<td style='background-color:lightgrey' > REMOTE_ADDR" . "   " . $_SERVER['REMOTE_ADDR'] . "</td> ";
	echo "<td style='background-color:lightgrey' > REMOTE_PORT"  . "  " . $_SERVER['REMOTE_PORT'] . "</td> ";
	
	echo " ";
	echo "<tr style='border: solid'>";

echo "</table>";


echo "<h2>Variables del Requerimiento</h2>";

echo "<table>";

	echo "<tr style='border: solid ; border-color:black '>";
	echo "<td style='background-color:#F7D3B3' > REMOTE_ADDR : " . "   " . $_SERVER['SCRIPT_NAME'] . "</td> ";
	echo "<td style='background-color:#F7D3B3' > REMOTE_PORT : "  . "  " . $_SERVER['REQUEST_METHOD'] . "</td> ";
	
	echo " ";
	echo "<tr style='border: solid'>";

echo "</table>";


echo "<h2>TODAS</h2>";


foreach ($_SERVER as $key_name => $value_name) {
	echo "<p>" . $key_name  . $value_name  .  "</p>";
	
}




























 ?>