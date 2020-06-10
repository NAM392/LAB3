<link rel="icon" href="../../Argentina-icon.ico">
<?php 


echo "<h2>Variables del tipo objeto en PHP.Objeto renglon de pedido</h2>";

echo "<h2 style='color:blue' >\$objRenglosdePedido</h2>";

$objRenglosdePedido = new stdclass;
$objRenglosdePedido->codArt = "cp001";
$objRenglosdePedido->DescripcionArticulo = "jugo ";
$objRenglosdePedido->PrecioUnitario = 30;
$objRenglosdePedido->Cantidad = 2;


foreach ($objRenglosdePedido as $key => $value) {
	echo "<p>" . $key . " : " . $value . "</p>";
}


echo "<h2> Tipo de <span style='color:blue' > \$objRenglosdePedido </span>  : " . gettype($objRenglosdePedido) . "</h2>";


echo "<h2>Definamos arreglo de pedidos : </h2>";
echo "<h2 style='color:blue'>\$RenglonesdePedido</h2>";
$RenglonesdePedido = [];

echo "<h3> Tabula <span style='color:blue' > \$RenglonesdePedido </span>.Recorrer el arreglo de renglones y tabularlos con html </h3>";

array_push($RenglonesdePedido, $objRenglosdePedido);

foreach ($RenglonesdePedido as $objRenglosdePedido) {
	echo "<p>"  . $objRenglosdePedido->codArt . "  " . $objRenglosdePedido->DescripcionArticulo . " " . $objRenglosdePedido->PrecioUnitario  . "  " . $objRenglosdePedido->Cantidad . "</p>";
}

echo "<h4>Cantidad de renglones : " . count($RenglonesdePedido) . "</h4>";

echo "<h3>Produccion de un objeto <span style='color:blue' > \$objRenglosdePedido </span> con dos atributos array RenglonesdePedido y CantidadDeRenglones</h3>";

$objRenglosdePedido = new stdclass();

$objRenglosdePedido->RenglonesdePedido=$RenglonesdePedido;
$objRenglosdePedido->CantidadDeRenglones=count($RenglonesdePedido);

echo "<h4>Cantidad de renglones : " . $objRenglosdePedido->CantidadDeRenglones . "</h4>";

echo "<h3>Produccion de un JSON jsonRENGLONES : </h3>";

$jsonRENGLONES=json_encode($objRenglosdePedido);

echo $jsonRENGLONES;

















 ?>