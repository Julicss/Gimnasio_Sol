<!-- html/inscripcion.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Inscripcion a actividades</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>
<body>
	<form action="inscripcion2.php" method="post" id="formulario">
		<label>Seleccione actividad:</label>
		<select name="actividad">
			<?php foreach ($this->actividades as $a){ ?>
				<option value="<?=$a['nombre_actividad']?>"><?=$a['nombre_actividad']?></option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Siguiente"><br/><br/>
	</form>

	<div id="mensaje"></div>

	<script>
		"use strict"

		document.getElementById("formulario").onsubmit=function(){
			var d=document.getElementById("d").value;
			var mensaje=document.getElementById("mensaje");
			if(d.length==0){
				mensaje.innerHTML+="Por favor ingrese su DNI para verificar su identidad<br/><br/>";
				return false;
			}
		}
	</script>

	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>