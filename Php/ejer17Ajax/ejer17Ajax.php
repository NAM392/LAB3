<html>
<head>
	<title>ejer17Ajax</title>
	<link rel="icon" href="../../Argentina-icon.ico">

<style>
	

	div.Cont{

		height: 450px;
		background-color: lightblue;
		width: 90%;
		margin-left: 5%;
		display: flex;

	}

	div.entrada{
		height: 200px;
		width: 33%;
		background-color: grey;
	}

	div.boton{
		height: 200px;
		width: 33%;
		background-color: blue;	
		color: white;	
	}

	div.resultado{
		height: 200px;
		width: 34%;
		background-color: blanchedalmond;
	}

	div.succesi{
		height: 250px;
		width: 33%;
	    background-color: #4A4641;
	    display: block;
	    margin-top: 200px;
	    margin-left: -970px;

	}
	button.botoncito{
		background-image: url('flecha.PNG');
		height: 80px;
		width: 40%;
		margin-left: 30%;
	}
	
	input{
		margin-left: 5%;
	}
	h2 , h4{
		margin-left: 5%;
	}

</style>

</head>
<body>

<form  method="GET" id="formulario">
<div class="Cont" >
	<div class="entrada" >
		<h2>Datos de entrada : </h2>
		<input type="text" id="entrada" name="entrada">
	</div>
	<div class="boton" >
		<h2>Encriptar</h2>
		<button class="botoncito" id="boton" name="boton" type="submit"></button>
	</div>
	<div  class="resultado" id="resultado" name="resultado" >
		<h2>Resultado : </h2>
	</div>
	<div class="succesi" id="estado" name="estado" >
		<h4>Estado del Requerimiento : </h4>
	</div>
</div>
</form>

</body>
<script  src="../../jquery.js" ></script>
<script type="text/javascript">

		
	$(document).ready(function(){

		$("#boton").click(function(){
				$("#resultado").empty();  
				//$("#resultado").addClass("estiloRecibiendo");
				$("#resultado").html("<h2>Esperando Respuesta..</h2>");
				$("#estado").empty();
				$("#estado").append("<h4>Estado del requerimiento : </h4>");
				
				$.ajax({
						
						url:'./resultado.php',
						data:{entrada:$('#entrada').val()},
						type:'GET',
						success:function(respuestaDelServer , state){
								
								$("#resultado").empty();
								$("#estado").empty();
								$("#resultado").append(respuestaDelServer);
								$("#estado").append(state);
						},
						//error: function(respuestaDelServer){
       					 //$("#resultado").empty();}
				});//cierra ajax

		});//cierra el click
	});		
</script>
