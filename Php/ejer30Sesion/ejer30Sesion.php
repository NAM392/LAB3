<?php 


session_start();
if(!isset($_SESSION['ejercicio'])){
	header('location:./formularioDeLogin.html');
	exit();
}
else{
	header('location:./ejerABM.php');
}





/*

nico = nicolas

rulo = pepe



*/



































 ?>