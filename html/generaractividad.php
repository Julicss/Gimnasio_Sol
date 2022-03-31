<!-- html/generaractividad.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Generar actividad</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<form action="" method="post" id="formulario">
		<label><strong>Nombre de actividad:</strong></label> 
		<input type="text" name="nombre" id="nombre" pattern="[a-zA-Z ]+" maxlength="30">
		<br/><br/>
		<label><strong>Seleccione el dia:</strong></label> 
		<select name="dia">
    	<?php $dia=array(1=>"Lunes", 2=>"Martes", 3=>"Miercoles", 4=>"Jueves", 5=>"Viernes", 6=>"Sabado"); ?>
			<?php for($i=1;$i<=6;$i++) {?>
			<option value="<?=$dia[$i]?>"><?=$dia[$i]?></option>
			<?php } ?>
		</select>
		<br/><br/>
		<label><strong>Seleccione el horario:</strong></label> 
		<select name="horario">
			<?php for($i=8;$i<=21;$i++) {?>
			<option value="<?=$i?>"><?=$i?>:00</option>
			<?php } ?>
		</select>
		<br/><br/>
		<label><strong>Seleccione el limite de socios:</strong></label> 
		<select name="limite">
			<?php for($i=4;$i<=10;$i++) {?>
			<option value="<?=$i?>"><?=$i?></option>
			<?php } ?>
		</select>
		<br/><br/>
		<input type="submit" value="Generar actividad">
		<br/><br/>
	</form>
	<div id="mensaje"></div>

	<script>
		"use strict"

		document.getElementById("formulario").onsubmit=function(){
			var n=document.getElementById("nombre").value;
			var mensaje=document.getElementById("mensaje");
			if(n.length==0){
				mensaje.innerHTML="Por favor ingrese el nombre de la actividad<br/><br/>";
				return false;
			}
		}
	</script>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>