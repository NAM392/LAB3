<?php 



			sleep(1);

			$entradas = $_POST['entrada'];
			$claveSha = sha1($entradas);
			$claveMd5 = md5($entradas);
			echo "<h4> clave ingresada : $entradas </h4>";
			echo "<h4> clave encriptada sha1 : $claveSha </h4>";
			echo "<h4> clave encriptada md5 : $claveMd5 </h4>";
		


 ?>

