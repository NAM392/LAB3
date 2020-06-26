<link rel="icon" href="../../Argentina-icon.ico">
<?php 


echo "Clave = " . $_GET['clave'];
echo "<br>";
echo "Clave encriptada en md5 (128 bits o 16 pares hexadecimales) :  " . md5($_GET['clave']) ;
echo "<br>";
echo "<br>";
echo "Clave = " . $_GET['clave'];
echo "<br>";
echo "Clave encriptada en sha1 (160 bits o 20 pares hexadecimales) :  " . sha1($_GET['clave']) ;


 ?>