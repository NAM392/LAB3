<?php 


session_start();
if(!isset($_SESSION['ejercicio'])){
	header('location:./formularioDeLogin.html');
	exit();
}
else{
	header('location:./app_modulo/ejerABM.php');
}





/*

nico = nicolas

rulo = pepe



*/



































 ?>