<?php session_start();
if(!isset($_SESSION['ejercicio'])){
	header('location:../formularioDeLogin.html');
	exit();
}

 ?>
<!-- HAGO ESTE EJERCICIO EN PHP PARA PROTEGERLO TAMBIEN CON LA SESION  -->
<html>
<head>
	<title>ABM</title>
<meta http-equiv="content-type" ; content="text/html" ; charset="utf-8">
<link rel="icon" href="../../../Argentina-icon.ico">
<style>

		/**/
			html , body {
				height: 100%;
				width: 100%;
				overflow: hidden;
			}
			*{margin: 0 ; padding: 0 ; border:0 none ;} 
			 
			*{box-sizing: border-box;}
			
			table{
				height: 100%;
				width: 100%;
				background-color: white;
			}

			header {
				height: 10%;
				width: 100%;
				padding-left: 0%;
				font-size: 22px;
				color: black;
				background-color: #59C543;
				align-items: center;
				justify-content: center;
				display: flex;

				

			}

			td.arte{	width:15%;float: left; }


			/* [campo-dato]= '' le da atributos determinados a cada columna de la tabla */

			[campo-dato = 'art_CodArt']{
				width: 18%;
				padding-left: 20px;
			}
			[campo-dato = 'art_Family']{
				width: 19%;
				padding-left: 20px;
			}
			[campo-dato = 'art_Med']{
				width: 20%;
				padding-left: 20px;
			}

			[campo-dato = 'art_Des']{
				width: 20%;
				padding-left: 20px;
			}

			[campo-dato = 'art_fecha']{
				width: 10%;
				padding-left: 20px;
			}
			[campo-dato = 'art_saldo']{
				width: 10%;
				padding-left: 20px;
			}


			tr {
				display: block;  /* sin esto se agruparian todo en una columna  */
				overflow: hidden;
				height: 50px;

			}

			tr.regis{
				display: block;  /* sin esto se agruparian todo en una columna  */
				overflow: hidden;
				height: 25px;
				font-family: courier,arial,helvética;

			}

			tbody tr:nth-child(odd) {
				background:rgba(0 , 0 , 0 , .2);
			}  /*esta funcion es para poder cambiar el tono de una fila a otra */

			th {
				border-right: 1px solid rgba(0,0,0,.2);
				height: 100%;
				width: 100%;
				box-sizing: border-box;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			th , td {
					float: left;
				}


			tbody {
				display: block; /*sin esta funcion todo caeria para abajo*/
				height: 300px;
				width: 100%;
				overflow-y: scroll; /*sin esta funcion todo lo scroleable saldria de la tabla*/
				background-color: lightgrey;

			}
			thead {
				display: block;
				width: 100%;
				background-color: #C52807;
				text-align: center;
			}

			button{
				margin-left: 20%;
				width: 100px;
				height: 40px;
			}
		

			/* asegura pirtabilidad , quita elementos menos redundantes si la pantalla es mas pequeña */

			/*
			@media(max-width: 1000px){
				[campo-dato = 'art_saldo']{
					display: none;
				}

			}

			@media(max-width: 800px){
				[campo-dato = 'art_fecha']{
					display: none;
				}

			}
			@media(max-width: 700px){
				[campo-dato = 'art_CodArt']{
					display: none;
				}

			}


			STYLE DE VENTANA MODAL
					div.fondo{

				height: 450px;
			    width: 100%;
			    background-color: lightblue;
			    opacity: 1;
			    pointer-events: auto;
			}
			*/


		
/*
		div.ventana{
				
			        height: 200px;
				    width: 403px;
				    background-color: #C21E1E;
				    margin-left: 246px;
				    margin-top: 7%;
				    display: block;
				    opacity: 1;
				    pointer-events: auto;
				    visibility: visible;
				    position: fixed;
			    

		}*/


			div.ventana {
			    height: 200px;
			    width: 403px;
			    background-color: #C21E1E;
			    margin-left: 350px;
			    margin-top: -30%;
			    display: block;
			    opacity: 1;
			    pointer-events: auto;
			    visibility: visible;
			    position: fixed;
			    margin-bottom: 59px;
			}


		div.modal1{
				background-color: #A7E823;
			    height: 142px;
			    width: 403px;
			    display: flex;
			    margin-top: 29px;
		}


		div.prim{

			        height: 142px;
				    width: 201px;
				    background-color: #A7E823;
		}


		div.sec{
				height: 142px;
			    width: 201px;
			    background-color: #A7E823;
		}


		input.ini{
			height: 10px;
		    margin: 0px;
		    margin-left: 15px;
		    background-color: white;
		}



		p{
			    margin: 0px;
   			    margin-left: 15px;
		}


		select{
			    width: 145px;
   				 margin-left: 15px;
		}

		p.fech{
			padding-top: 20px;

		}

		select.fecha{
			margin-top: 0px;
		}





		input.but{
				height: 32px;
    			width: 14%;
				background-color: grey;
				color: white;
		}

		input.cl{
			background-color:white;
		    color: red;
		    margin: 0;
		    padding: 0;
		    height: 20px;
		}



		div.ventana_OFF{
			visibility: hidden;	
			position: fixed;

		}

		div.fondo_OFF{
				height: 450px;
			    width: 100%;
			    background-color: lightblue;
			    opacity: 0.3;
			    pointer-events: none;

		}

		div.todoNONE {
			opacity: 0.3;
			pointer-events: none;

		}

		div.ver {
			visibility: visible;
			opacity: 1;
			pointer-events: auto;
		}

		button{
			    width: 100px;
			    margin-left: 20px;
			    height: 20px;
		}
		input.Orden{
			width: 100px;
			margin-left: 10px;
		}

</style>

</head>
<body>
<div id="todo" class="ver">
<header> Vitivinicultura   <input class="Orden" readonly id="orden" > <button id="boton" >Carga Datos</button><button id="limpiar" >Limpiar</button><button id="alta" >Alta</button><button id="CerrarT" >Cerrar Sesion</button>

 </header>

<table>
	
<thead>
	<tr>

		<th  id="Bodega_Or" campo-dato = 'art_CodArt' >BODEGA</th>
		<th id="Nombre_Or"  campo-dato = 'art_Family' > NOMBRE</th>
		<th id="Origen_Or"  campo-dato = 'art_Med' > PAIS</th>		
		<th id="Varietal_Or" campo-dato = 'art_Des' > VARIETAL</th>	
		<!--<th  campo-dato = 'art_fecha' ></th>	-->

					
	</tr>

		<tr>


		<th   campo-dato = 'art_CodArt'  ><input type="text" id="marcaV"  value="" required></th>
		<th  campo-dato = 'art_Family' > <input type="text" id="nombreV" value="" required ></th>
		<th  campo-dato = 'art_Med' > <input type="text" id="paisV" value="" required></th>	
		<th  campo-dato = 'art_Des' > <input type="text" id="varietalV" value="" name="varietalV" required></th>
		
					
	</tr>

</thead>

<tbody id="tablas" >


</tbody>
<!-- Ventana Modal Div de Alta -->



<thead>
	<tr class="regis">
		<th id="Registros" ></th>
	</tr>
	<tr>

		<th  campo-dato = 'art_CodArt' >BODEGA</th>
		<th  campo-dato = 'art_Family' > NOMBRE</th>
		<th  campo-dato = 'art_Med' >PAIS</th>	
		<th  campo-dato = 'art_Des' > VARIETAL</th>
		
		<!--<th  campo-dato = 'art_fecha' >MODIS BAJAS</th>	-->			
				
	</tr>
</thead>



</table>

</div>
<!--VENTANA DE ALTA-->
<div class="ventana_OFF" id="modal">
	<input type="button" value="X" class="cl" id="closed" >
	<div class="modal1" id="interna" >
		
		<div class="prim" id="Form_alta" >
			<p>Bodega</p>
			<br>
			<input type="text" name="" class="ini"  id="marca_alta">

				<p>Nombre</p>
			<input type="text" name="" class="ini" id="nombre_alta" >

				<p>Pais</p>
			<input type="text" name="" class="ini" id="pais_alta" >
		</div>
		<div class="sec" >

			<p class="fech" >Varietal</p>
			<input type="text" name="" class="ini" id="varietales_alta" >
		<!--	<select  class="fecha" id="varietales_alta" ></select>-->
			<br><br><br><br>
			<button id="enviar" >Agregar</button>
			

		</div>

	</div>

</div>
<!--	VENTANA DE MODIFICA-->
<div class="ventana_OFF" id="modificacion">
	<input type="button" value="X" class="cl" id="Cierro_modi" >
	<div class="modal1" >
		
		<div class="prim" >

			<p>Bodega</p>
			<br>
			<input type="text" name="" class="ini"  id="marca_modi">

			<p>Nombre</p>
			<input type="text" name="" class="ini" id="nombre_modi" readonly >

			<p>Pais</p>
			<input type="text" name="" class="ini" id="origen_modi" >

		</div>
		<div class="sec" >

			<p class="fech" >Varietal</p>
			<input type="text" name="" class="ini" id="varietales_modi" >
			<!--<select  class="fecha" id="varietales_modi" ></select>-->
			<br><br><br><br>
			<button id="btn_Modi" >Modificar</button>
		</div>

	</div>

</div>
<!-- VENTANA DE RESPUESTA DEL SERVER -->
<div class="ventana_OFF" id="ventana_del_server">
	<input type="button" value="X" class="cl" id="Cierro_respuesta" >
	<div class="modal1" id="respuesta_del_server">
	
	</div>

</div>
</body>

<script  src="./jquery.js" ></script>

<script type="text/javascript">
	

//acciones globales
var objBoton = document.getElementById("boton");
var btLimp = document.getElementById("limpiar");
var objTBD = document.getElementById("tablas");
var objREG = document.getElementById("Registros");
var ModalRespuesta = document.getElementById("respuesta_del_server");
var objCierrRespuesta = document.getElementById("Cierro_respuesta");


//acciones alta
var objIngVar = document.getElementById("varietales_alta");
var objIngName = document.getElementById("nombre_alta");
var objIngMark = document.getElementById("marca_alta");
var objIngOrig = document.getElementById("pais_alta");
var objClosed = document.getElementById("closed");
var objEnviar = document.getElementById("enviar");

//acciones modifica
var objCierrModi = document.getElementById("Cierro_modi");
//var btnModifica = document.getElementById("btn_Modi");
//var objSelVarModi = document.getElementById("solo_var");
var formdealta = document.getElementById("Form_alta");

function cargaTabla(){
	$("#tablas").empty();
	$("#tablas").html("<p>Esperando respuesta .. </p>");
	var objAjax = $.ajax({
						
						url: "./salidaJSONVinos.php",
						data: {
							
							orden: $("#orden").val(),
							marcaV: $("#marcaV").val(),
							nombreV: $("#nombreV").val(),
							paisV: $("#paisV").val(),
							varietalV: $("#varietalV").val()
							
						},
						type:"GET",
						success:function(respuesta , state){

									$("#tablas").empty();
									var objJSON = JSON.parse(respuesta);
									objJSON.Vinos.forEach(function(argValor , argIndice){
										var objTR = document.createElement("tr");
																	
											var objTD = document.createElement("td");	
											objTD.setAttribute("campo-dato" , "art_CodArt");
											objTD.innerHTML = argValor.Codigo;
											objTR.appendChild(objTD);
											
											var objTD = document.createElement("td");
											objTD.setAttribute("campo-dato" , "art_Family");
											objTD.innerHTML = argValor.Nombre;
											objTR.appendChild(objTD);
										
											var objTD = document.createElement("td");
											objTD.setAttribute("campo-dato" , "art_Med");
											objTD.innerHTML = argValor.PaisDeOrigen;
											objTR.appendChild(objTD);
																				
											var objTD = document.createElement("td");
											objTD.setAttribute("campo-dato" , "art_Des");
											objTD.innerHTML = argValor.Varietal;
											objTR.appendChild(objTD);
											
											//Creo Boton de Modificacion
											var objTD = document.createElement("td");
											objTD.setAttribute("campo-dato","art_fecha");
											var WineName = argValor.Nombre;
											var btn1 = document.createElement("button");
											btn1.innerHTML = "Modificacion";
											btn1.setAttribute('id',WineName);
											btn1.setAttribute('onclick','ModifiChange(this.id)');
											objTD.appendChild(btn1);
											objTR.appendChild(objTD);


											//Creo Boton de Borrado
											var objTD = document.createElement("td");
											objTD.setAttribute("campo-dato","art_saldo");
											var WineName = argValor.Nombre;
											var btn2 = document.createElement("button");
											btn2.innerHTML = "Borrado";
											btn2.setAttribute('id',WineName);
											btn2.setAttribute('onclick','borrando(this.id)');
											objTD.appendChild(btn2);
											objTR.appendChild(objTD);	


											objTBD.appendChild(objTR);
											
										});//cierro el foreach

									objREG.innerHTML = "Cantidad de registros  " + objJSON.cuenta ;

						}	//cierra funcion asignada al success

					});	//cierra ajax

}  //cierro carga tabla	

//inicio del documento
$(document).ready(function(){
	$("#orden").val("Nombre");
	cargaTabla();

});
//inicio del documento
$(document).ready(function(){
	objEnviar.disabled = true;
	objIngName.type="text";
	objIngOrig.type="text";
	objIngMark.type="text";
	objIngVar.type="text";

});


//boton limpiar
$("#limpiar").click(function(){
	$("#tablas").empty();
	$("#Registros").empty();

});

//carga elementos
$("#boton").click(function(){		
		cargaTabla();
});

$("#CerrarT").click(function(){ 
	var conf = confirm("Esta seguro que desea cerrar sesion ? ");
	if(conf==true){
	location.href = "../destruirSesion.php";
	}
});	
//enviar formulario de ALTA	
$("#enviar").click(function(){
	var conf = confirm("Esta seguro que desea agregar ? ");
	if(conf==true){
		alta();
		$("#marca_alta").val("");
		$("#nombre_alta").val("");
		$("#pais_alta").val("");
		$("#varietales_alta").val("");
		$("#modal").attr("class","ventana_OFF");
		$("#ventana_del_server").attr("class","ventana");
		cargaTabla();
	}
});

//boton ordena por BODEGA
$("#Bodega_Or").click(function(){
	$("#orden").val("Codigo");
	cargaTabla();
	$("#orden").val("Bodega");
});

//boton ordena por Nombre
$("#Nombre_Or").click(function(){
	$("#orden").val("Nombre");
	cargaTabla();
});

//boton ordena por Origen
$("#Origen_Or").click(function(){
	$("#orden").val("PaisDeOrigen");
	cargaTabla();
});

//boton ordena por Varietal
$("#Varietal_Or").click(function(){
	$("#orden").val("Varietal");
	cargaTabla();
});


//boton abrir DIV ALTA
$("#alta").click(function(){
	$("#todo").attr("class","todoNONE");
	$("#modal").attr("class","ventana");
	objIngMark.select();
	

});


//Cierra alta
objClosed.onclick=function(){
	$("#todo").attr("class","ver");
	$("#modal").attr("class","ventana_OFF");
	$("#marca_alta").val("");
	$("#nombre_alta").val("");
	$("#pais_alta").val("");
	objEnviar.disabled = true;
	$("#varietales_alta").val("");
	$("#Registros").empty();
	cargaTabla();
	}	

//cierro div Modifica	
objCierrModi.onclick=function(){
	$("#todo").attr("class","ver");
	$("#modificacion").attr("class","ventana_OFF");
	cargaTabla();
	}

//cierro respuesta del servidor	
objCierrRespuesta.onclick=function(){
	$("#todo").attr("class","ver");
	$("#ventana_del_server").attr("class","ventana_OFF");
	cargaTabla();
	}

// abro modifica
function AbroModifica(){
	$('#todo').attr('class','todoNONE');
	$('#modificacion').attr('class','ventana');

}
//enviar formulario de MODIFICA
$("#btn_Modi").click(function(){
	var conf = confirm("Esta seguro que desea modificar ? ");
	if(conf==true){
		modi();
		$("#marca_modi").val("");
		$("#nombre_modi").val("");
		$("#origen_modi").val("");
		$("#varietales_modi").val("");
		$("#modificacion").attr("class","ventana_OFF");
		$("#ventana_del_server").attr("class","ventana");
	}
});

//BAJA DE VINO
function borrando(nombre){
	var confirmado = confirm("Desea borrar el  vino  " + nombre + " ?" );
	if(confirmado == true){
		baja(nombre);
		$("#tablas").empty();
		$("#Registros").empty();
		$("#ventana_del_server").attr("class","ventana");
	}
	
};

//valida las entradas al div de alta

function modi(){	
	
	var objAjax = $.ajax({
						
						url: "./modi.php",
						data: {
							
							/*orden: $("#orden").val(),*/
							marcaV: $("#marca_modi").val(),
							nombreV: $("#nombre_modi").val(),
							paisV: $("#origen_modi").val(),
							varietalV: $("#varietales_modi").val()
							
						},
						type:"GET",
						success:function(respuesta , state){

									ModalRespuesta.innerHTML = respuesta;		

						}	//cierra funcion asignada al success

					});	//cierra ajax

}  //cierro alta	


function CompletaFichaNombre(nombre){
		var objAjax = $.ajax({
						
						url: "./salidaJSON1Vino.php",
						data: {
							
							nombreDelVino: nombre,
														
						},
						type:"GET",
						success:function(respuesta , state){
									
									var objJSON = JSON.parse(respuesta);
									objJSON.Vinos.forEach(function(argValor , argIndice){
										
											$("#marca_modi").val(argValor.Codigo);
											
											$("#nombre_modi").val(argValor.Nombre);
											
											$("#origen_modi").val(argValor.PaisDeOrigen);
										
											$("#varietales_modi").val(argValor.Varietal);
																					

										});//cierro el foreach

									
						}	//cierra funcion asignada al success

					});	//cierra ajax

}  //cierro CompletaFichaNombre

function ModifiChange(NombredelVino){
		CompletaFichaNombre(NombredelVino);
		AbroModifica();
		
}		

function baja(nombre){
		var objAjax = $.ajax({
						
						url: "./baja.php",
						data: {
							
							nombreDelVino: nombre,
														
						},
						type:"GET",
						success:function(respuesta , state){

									ModalRespuesta.innerHTML = respuesta;		

						}	//cierra funcion asignada al success

					});	//cierra ajax

}  //cierro baja	


function alta(){	
	
	var objAjax = $.ajax({
						
						url: "./alta.php",
						data: {
														
							marcaV: $("#marca_alta").val(),
							nombreV: $("#nombre_alta").val(),
							paisV: $("#pais_alta").val(),
							varietalV: $("#varietales_alta").val()
							
						},
						type:"GET",
						success:function(respuesta , state){


									ModalRespuesta.innerHTML = respuesta;	

						}	//cierra funcion asignada al success

					});	//cierra ajax

}  //cierro alta	

/*
function llenaVarietales(){
	
	var objAjax = $.ajax({
						
						url: "./salidaJSONVarietal.php",
						data: {	},
						type:"GET",
						success:function(respuesta , state){
							
							var objJSON = JSON.parse(respuesta);
							objJSON.varietales.forEach(function(argValor , argIndice){
								var objOpcion = document.createElement("option");
								objOpcion.setAttribute("value" , argValor.Varietal);
								objOpcion.innerHTML = argValor.Varietal;
								objingvar.appendChild(objOpcion);
																			
							});//cierro el foreach

						}	//cierra funcion asignada al success

	});	//cierra ajax

};  //cierro llenavarietal

*/



function todoListoParaAlta()
{

	if(objIngOrig.checkValidity() && objIngMark.checkValidity() && objIngName.checkValidity() && objIngVar.checkValidity() ){
			
			objEnviar.disabled = false;
			
		}

	else {
			objEnviar.disabled = true;
					
		 }


}



//keyup de origen
objIngOrig.onkeyup=function(){
	
	todoListoParaAlta();
}

//keyup de marca
objIngMark.onkeyup=function(){
	
	todoListoParaAlta();
}
//keyup de nombre
objIngName.onkeyup=function(){
	
	todoListoParaAlta();
}



</script>
</html>


















