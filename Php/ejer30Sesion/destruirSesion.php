<?php 

session_start();
if(!isset($_SESSION['ejercicio'])){
	header('location:./formularioDeLogin.html');
	exit();
}


session_destroy();

header('Location:./formularioDeLogin.html');



 ?>