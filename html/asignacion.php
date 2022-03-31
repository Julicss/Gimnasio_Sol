<!-- html/asignacion.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Asignar profesor</title>
	<link rel="stylesheet" type="text/css" href="../css/cssadmin.css">
</head>
<body>
	<form action="profesorasignado.php" method="post">
		<label><strong>Seleccione profesor:</strong></label> 
		<select name="profesor">
			<?php foreach ($this->profesores as $p){ ?>
				<option value="<?=$p['id_profesor']?>"><?=$p['nombre_profesor']?></option>
			<?php } ?>
		</select> <br/><br/>
		<label><strong>Seleccione actividad:</strong></label> 
		<select name="actividad">
			<?php foreach ($this->actividades as $a){ ?>
				<option value="<?=$a['codigo_actividad']?>"><?=$a['nombre_actividad']?>/<?=$a['dia']?>/<?=$a['hora']?>:00</option>
			<?php } ?>
		</select> <br/><br/>
		<input type="submit" value="Asignar">
		<br/><br/>
	</form>
	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>
</html>