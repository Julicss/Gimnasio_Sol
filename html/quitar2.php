<!-- html/quitar2.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Quitar profesor</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<form action="quitar3.php" method="post" id="formulario">
		<input type="hidden" name="profesor" value="<?=$this->id_profesor?>">
		<label><strong>Seleccione actividad a remover:</strong></label> 
		<select name="actividad" id="act">
			<?php foreach ($this->actividades as $a){ ?>
				<option value="<?=$a['codigo_actividad']?>"><?=$a['nombre_actividad']?>/<?=$a['dia']?>/<?=$a['hora']?>:00</option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Quitar actividad">
		<br/><br/>
	</form>
	<div id="mensaje"></div>
	<script>
		"use strict"

		document.getElementById("formulario").onsubmit=function(){
			var act=document.getElementById("act").value;
			var mensaje=document.getElementById("mensaje");
			if(act.length==0){
				mensaje.innerHTML+="El profesor no esta asignado a ninguna actividad" ;
				return false;
			}
		}
	</script>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>