<!-- html/vistaactividades.php -->
<!DOCTYPE html>
<html> 
<head>
	<title>Actividades</title>
	<link rel="stylesheet" type="text/css" href="../css/csscronograma.css">
</head>

<body>
	<table>
	<tr>
		<th>Actividad</th>
       	<th>Dia</th>
       	<th>Hora</th>
       	<th>Capacidad</th>
       	<th>Cantidad</th>
      	<th>Profesor</th>
    </tr>
		<?php foreach ($this->actividades as $a) { ?>
	<tr>
		<td><?=$a['nombre_actividad']?></td>
		<td><?=$a['dia']?></td>
		<td><?=$a['hora']?>:00</td>
		<td><?=$a['limite']?></td>
		<td><?=$a['cantidad']?></td>
		<td><?=$a['nombre_profesor']?></td>
	</tr>
		<?php } ?>
	</table>

	<form action="principal_administrativo.php" method="get">
		<input type="submit" value="Volver a menu principal">
	</form>
</body>	
</html>