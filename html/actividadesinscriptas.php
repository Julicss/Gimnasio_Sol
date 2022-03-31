<!-- html/actividadesinscriptas.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Actividades inscriptas</title>
	<link rel="stylesheet" type="text/css" href="../css/csssocio.css">
</head>

<body>
	<h1>Lista de actividades:</h1>
	<table>
	<tr>
		<th>Actividad</th>
		<th>Dia</th>
		<th>Horario</th>
		<th class="invisible"></th>
	</tr>
	<?php foreach ($this->actividades as $a) { ?>
	<tr>
		<td><?=$a['nombre_actividad']?></td>
		<td><?=$a['dia']?></td>
		<td><?=$a['hora']?>:00</td>
		<td th class="invisible">
			<form action="" method="post">
			<input type="hidden" name="actividad" value="<?=$a['codigo_actividad']?>">
			<input type="submit" value="Eliminar inscripción">
			</form>
		</td>
	</tr>
	<?php } ?>
	</table><br/><br/>

	<form action="principal_socios.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>	
</html>